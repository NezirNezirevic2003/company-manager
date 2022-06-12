<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Task;

class TaskTable extends DataTableComponent
{
    protected $model = Task::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Description", "description")
                ->sortable()->searchable(),

            Column::make("Created at", "created_at")
                ->sortable()->collapseOnTablet(),
            Column::make("Updated at", "updated_at")
                ->sortable()->collapseOnTablet(),
        ];
    }
}