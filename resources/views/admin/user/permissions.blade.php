@extends('admin_layouts.app')

@section('content')
 <header>
    <nav>
      <ul class="breadcrumb">
          <li><a href="{{route('dashboard')}}">Dashboard /</a></li>
        <li><a href="#">Create Permissions</a></li>
 
      </ul>
    </nav>
  </header>
        <div class="d-flex justify-content-between align-items-center position-relative mb-4">
            <h1>Create Permissions</h1>
        </div>
        <div class="table-responsive">
            <form method="POST" action="/permissions/assign">                @csrf
                <div class="mb-3">
                    <label for="role" class="form-label">{{ __('Select Role') }}</label>
                    <select name="role" id="role" class="form-select" required>
                        <option value="" disabled selected>{{ __('Select Role') }}</option>
                        @foreach ($roles as $roleId => $roleName)
                            <option value="{{ $roleId }}">{{ $roleName }}</option>
                        @endforeach
                    </select>
                </div>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('Permission Name') }}</th>
                            <th scope="col">{{ __('Assign') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr class="font-style">
                                <td>{{ $permission->name }}</td>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="custom-control-input" id="permission{{ $permission->id }}">
                                        <label class="custom-control-label" for="permission{{ $permission->id }}"></label>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2" class="text-end">
                                <input type="submit" value="{{ __('Save Permissions') }}" class="btn btn-primary">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
@endsection
