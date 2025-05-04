<?php

namespace App\Filament\Pages;

use App\Models\Epic;
use App\Models\Project;
use App\Models\Ticket;
use Filament\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;

class EpicsOverview extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-flag';
    protected static string $view = 'filament.pages.epics-overview';
    protected static ?string $navigationGroup = 'Project Management';
    protected static ?string $navigationLabel = 'Epics';
    protected static ?int $navigationSort = 3;

    public Collection $epics;
    public array $expandedEpics = [];
    public ?int $selectedProjectId = null;
    public Collection $availableProjects;

    public function mount(): void
    {
        $this->loadAvailableProjects();

        if ($this->availableProjects->isNotEmpty() && !$this->selectedProjectId) {
            $this->selectedProjectId = $this->availableProjects->first()->id;
        }

        $this->loadEpics();
        $this->expandedEpics = $this->epics->pluck('id')->toArray();
    }

    public function loadAvailableProjects(): void
    {
        $user = auth()->user();

        if ($user->hasRole('super_admin')) {
            $this->availableProjects = Project::orderBy('name')->get();
        } else {
            $this->availableProjects = $user->projects()->orderBy('name')->get();
        }
    }

    public function loadEpics(): void
    {
        $query = Epic::with([
            'project',
            'tickets' => function ($query) {
                $query->with(['status', 'assignee']);
            }
        ])
        ->orderBy('start_date', 'asc');

        if ($this->selectedProjectId) {
            $query->where('project_id', $this->selectedProjectId);
        }

        $this->epics = $query->get();
    }

    public function toggleEpic(int $epicId): void
    {
        if (in_array($epicId, $this->expandedEpics)) {
            $this->expandedEpics = array_diff($this->expandedEpics, [$epicId]);
        } else {
            $this->expandedEpics[] = $epicId;
        }
    }

    public function isExpanded(int $epicId): bool
    {
        return in_array($epicId, $this->expandedEpics);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('selectedProjectId')
                    ->label('Project')
                    ->options($this->availableProjects->pluck('name', 'id'))
                    ->live()
                    ->afterStateUpdated(function () {
                        $this->loadEpics();
                    }),
            ]);
    }

    #[On('epic-created')]
    #[On('epic-updated')]
    #[On('epic-deleted')]
    #[On('ticket-created')]
    #[On('ticket-updated')]
    #[On('ticket-deleted')]
    public function refreshEpics(): void
    {
        $this->loadEpics();

        $currentEpicIds = $this->epics->pluck('id')->toArray();
        $this->expandedEpics = array_intersect($this->expandedEpics, $currentEpicIds);

        Notification::make()
            ->title('Data refreshed')
            ->success()
            ->send();
    }

    public static function canAccess(): bool
    {
        return auth()->user()?->hasAnyRole(['super_admin', 'رؤساء المكاتب']);
    }
}
