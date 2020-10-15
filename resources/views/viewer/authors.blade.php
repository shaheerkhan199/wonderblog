@extends('viewer.master')
@section('title', 'Author Page')
@section('content')
    <div class="main-container">
        <!-- Body -->
        <div class="container mt-4">
            <h1>Authors</h1>
            <table class="table table-hover bg-light authors">
                <tbody>
                  @foreach($all_authors as $author)
                  <tr onclick="window.location='{{ route('clickedAuthor',[ 'author_id'=>$author->authorID]) }}';">
                    <td>
                        <p>{{ $author->fullName }}</p>
                        <small>Joined on: {{ $author->created_at }}</small><br>
                        <small>Wrote {{  count(\App\Models\Post::where(['author_id' => $author->authorID])->pluck('postTitle')) }} articles</small>
                        <a href="#" class="btn btn-success float-right">See all articles</a>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
        </div>

    </div>

@endsection