

<div>
    <!-- Livewire component for Enrolled Classes menu -->
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">class</th>
      <th scope="col">course_code</th>
      <th scope="col">teacher</th>
      <th scope="col">resources</th>
    </tr>
  </thead>
  <tbody>
     @foreach ($classes as $class)
        <tr>
          <td>{{ $class->desc }}</td>
          <td>{{ $class->course_code }}</td>
          <td>{{ $class->name }}</td>
          <td>
              <a class="text-primary underline" href="resources/{{ $class->course_code }}">view</a>
          </td>
        </tr>
    @endforeach
  
  </tbody>
</table>

</div>
