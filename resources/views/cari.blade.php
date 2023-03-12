@extends('layouts.main')
@section('title', 'Halaman Beranda')
@section('content')
<!-- PAGE CONTENT-->
<div class="page-content--bgf7">

    <!-- DATA TABLE-->
    <section class="p-t-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-1 m-b-20"><strong>data table library book</strong></h3>
                    <div class="table-data__tool">


                        <button class="">
                            <a href="{{ route('login')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">add item</a>
                        </button>
                        
                        <form class="au-form-icon--sm" action="/cari" method="GET">
                            <input class="au-input--w300 au-input--style2" type="text" name="cari" placeholder="Search for datas &amp; reports..." value="{{ old('cari')}}">
                            <button class="au-btn--submit2" type="submit" value="CARI">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>

                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th style="text-align: center; vertical-align: middle;">Pengarang</th>
                                    <th>Penerbit</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cruds as $index => $crud)   
                                <tr class="tr-shadow">
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $crud->judul }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $crud->pengarang }}</td>
                                    <td class="desc">{{ $crud->penerbit}}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <a class="zmdi zmdi-edit" href="{{ route('login')}}"></a>
                                            </button>
                                            <button href="#" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <a class="zmdi zmdi-delete" href="{{ route('login')}}"></a>
                                            </button>
                                        </div>
                                    </td>
                                    <tr class="spacer"></tr>
                                </tr>
                                 @endforeach
                            </tbody>
                        </table>
                        {{ $cruds->links() }}
                    </div>
                    <button class="">
                        <a href="{{ route('cruds.indexdua')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">show all</a>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- END DATA TABLE-->

    <!-- COPYRIGHT-->
    <section class="p-t-60 p-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END COPYRIGHT-->
</div>
@endsection