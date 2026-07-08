@props(['user'])

<div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 ">
    <table class="table">
        <tbody>
            <tr class="hover:bg-base-300">
                <th>First Name</th>
                <td>{{ $user->first_name }}</td>
            </tr>
            <tr class="hover:bg-base-300">
                <th>Last Name</th>
                <td>{{ $user->last_name }}</td>
            </tr>
            <tr class="hover:bg-base-300">
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr class="hover:bg-base-300">
                <th>Role</th>
                <td><span class="badge badge-primary">{{ $user->role->label() }}</span></td>
            </tr>
            <tr class="hover:bg-base-300">
                <th>Member Since</th>
                <td>{{ $user->created_at->format('M d, Y') }}</td>
            </tr>
        </tbody>
    </table>
</div>