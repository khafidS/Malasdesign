<table class="table">
  <thead></thead>
  <tbody>
    <tr>
      <th>Deskripsi</th>
      @foreach ($items as $item)
          <td>{{ $item->description }}</td>
      @endforeach
    </tr>
    <tr>
      <th>Kategori Template</th>
      <td>
        <table class="table table-bordered w-100">
          <tr>
            <th>Kategori</th>
          </tr>
          @foreach ($categories  as $category)
              <tr>
                <td>{{ $category->name }}</td>
              </tr>
          @endforeach
      </td>
    </tr>
  </tbody>
</table>