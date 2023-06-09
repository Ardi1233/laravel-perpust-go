@extends('layouts.app')
@section('title', 'Ardia | Dashboard')
@section('content')
<!-- PAGE CONTENT-->
<div class="page-content--bgf7">
    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-1 m-b-20"><strong>data tabel library book<strong></h3>
                    <div class="table-data__tool">

                        @if(Auth::user()->role == 'admin')

                        <button class="">
                            <a href="{{ route('cruds.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">add buku</a>
                        </button>

                        @endif
                        <form class="au-form-icon--sm" action="/cruds/show" method="GET">
                            <input class="au-input--w300 au-input--style2" type="text" name="cari" placeholder="Search for buku..." value="{{ old('cari')}}">
                            <button class="au-btn--submit2" type="submit" value="CARI">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>


                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <tr>
                                        <th>No</th>
                                        <th style="text-align: center; vertical-align: middle;">Gambar</th>
                                        <th style="text-align: center; vertical-align: middle;">Judul</th>
                                        <th style="text-align: center; vertical-align: middle;">Pengarang</th>
                                        <th style="text-align: center; vertical-align: middle;">Penerbit</th>
                                        <th style="text-align: center; vertical-align: middle;">Deskripsi</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cruds as $index => $crud)   
                                    <tr class="tr-shadow">
                                        <td style="text-align: center; vertical-align: middle;">{{ $index + 1 }}</td>
                                        <td style="text-align: center; vertical-align: middle;"><img src="{{asset('admin/images/buku/' . $crud->gambar)}}" width=200 alt=""></td>
                                        <td style="text-align: center; vertical-align: middle;">{{ $crud->judul }}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{ $crud->pengarang }}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{ $crud->penerbit}}</td>
                                        <td style="text-align: center; vertical-align: middle;">{{ $crud->deskripsi}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            @if(Auth::user()->role == 'admin')
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a class="zmdi zmdi-edit" href="{{ route('cruds.edit', $crud->id)}}"></a>
                                            </button>
                                            @endif
                                            @if(Auth::user()->role == 'admin')
                                            <button href="#" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a class="zmdi zmdi-delete" href="{{ route('cruds.destroy', $crud->id)}}"></a>
                                            </button>
                                            @endif
                                            @if(Auth::user()->role == 'user')
                                                <button class="">
                                                    @php($loaned = false)
                                                    @foreach($crud->loan as $loan)
                                                        @if ($loan->user_id == auth()->user()->id)
                                                            @php($loaned = true)
                                                            <a href="{{ route('return', $loan->id) }}" class="au-btn au-btn-icon au-btn--green au-btn--small">Kembalikan</a>
                                                        @endif
                                                    @endforeach
                                                    @if(!$loaned)
                                                        <a href="{{ route('borrow', $crud->id) }}" class="au-btn au-btn-icon au-btn--green au-btn--small">Pinjam</a>
                                                    @endif
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                    <tr class="spacer"></tr>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        {{ $cruds->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->

    <!-- COPYRIGHT-->
    
    <!-- END COPYRIGHT-->
</div>
@endsection

+