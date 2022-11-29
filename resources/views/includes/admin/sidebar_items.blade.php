<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-columns"></i>
        <p>
            Task Manager
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
                href="{{route('client.create')}}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Add Client</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{route('task.assign')}}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Add Task</p>
            </a>
        </li>
              
        <li class="nav-item">
            <a
                href="{{route('client.index')}}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Client List</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{route('project.index')}}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Project List</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{route('tasks.index')}}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Task List</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
            Administration
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
                href="{{ route('admin.department.create') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Add Department</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.deparment.list') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Departments List</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.schedule.list') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Office Schedule</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.designation.list') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Designation</p>
            </a>
        </li>

    </ul>
</li>

{{-- old menu --}}

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-calendar-check-o"></i>
        <p>
            Employees
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
                href="{{ route('admin.employees.create') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Add Employee</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.employees.index') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>List Employees</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.employees.attendance') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Employee Attendance</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-unlock-alt"></i>
        <p>
            Authorization
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
                href="{{ route('admin.leaves.index') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Leaves</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.expenses.index') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Expenses</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-calendar-minus-o"></i>
        <p>
            Holidays
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
                href="{{ route('admin.holidays.create') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Add Holiday</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.holidays.index') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>List Holidays</p>
            </a>
        </li>
    </ul>
</li>


{{-- new menue --}}

<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
            Remuneration
            <i class="fas fa-angle-left right"></i>
            <span class="badge badge-info right"></span>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a
                href="{{ route('admin.scheme.list') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Salary Scheme</p>
            </a>
        </li>
        <li class="nav-item">
            <a
                href="{{ route('admin.employees.salary') }}"
                class="nav-link"
            >
                <i class="far fa-circle nav-icon"></i>
                <p>Employee Salary</p>
            </a>
        </li>
    </ul>
</li>
