<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Exports\RegisterExport;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class StudentsTable extends Component
{
    use WithPagination;

    public string $search = '';
    public bool $showModal = false;
    public ?Student $selectedStudent = null;

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function export()
    {
        return Excel::download(
            new RegisterExport('students'),
            'Students-' . date('Y-m-d_H-i-s') . '.xlsx'
        );
    }

    public function openModal(int $studentId): void
    {
        $this->selectedStudent = Student::find($studentId);
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->selectedStudent = null;
        $this->showModal = false;
    }

    public function render()
    {
        $students = Student::query()
            ->where(function ($q) {
                $q->where('name',     'LIKE', '%' . $this->search . '%')
                  ->orWhere('lastname', 'LIKE', '%' . $this->search . '%')
                  ->orWhere('email',    'LIKE', '%' . $this->search . '%')
                  ->orWhere('ide',      'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('livewire.admin.dashboard.students-table', compact('students'));
    }
}
