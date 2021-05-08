@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="row" id="table-striped">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Kullanıcı Listesi
                    <a href="{{route('user.create')}}"><button style="float: right;" class="btn btn-primary">Kullanıcı Ekle</button></a></h4>

                    </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                    @if (Session('message'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            <div class="alert alert-success" role="alert">{{ Session('message') }}</div>
                        </div>
                    @endif
                        
                    </div>
                    <!-- table striped -->
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>İsim</th>
                                    <th>Email</th>
                                    <th>Meslek</th>
                                    <th>Adres</th>
                                    <th>Telefon</th>
                                    <th>İşlemler</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($users)>0)
                                @foreach ($users as $key => $user)                    
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->occupation}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td><a href="{{route('user.edit',$user->id)}}"><button style="float: left; margin-right:10px" class="btn btn-success">Düzenle</button></a>
                                        <a href="{{route('user.show',$user->id)}}"><button style="float: left; margin-right:10px" class="btn btn-primary">Göster</button></a>
                                      
                                        <a href="#"><button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$user->id}}">Sil</button></a>

                                        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                           <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                 <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Silme Alanı</h5>
                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                                 </button>
                                               </div>
                                               <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                                   @csrf
                                                   @method('DELETE')
                                               <div class="modal-body">
                                                 Silmek istediğine emin misin?
                                               </div>
                                               <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                                 <a href="{{route('user.destroy',$user->id)}}"><button class="btn btn-warning" title="Sil">Sil</button>
                                               </div>
                                                </form>

                                             </div>
                                           </div>
                                       </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <div class="alert alert-info" role="alert">Kayıtlı Kullanıcı Bulunamadı</div>
                                @endif
                            
                            </tbody>
                        </table>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection