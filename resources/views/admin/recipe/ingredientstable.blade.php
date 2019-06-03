<table class="table table-bordered" style="margin-bottom: 2em;">
           
                    @foreach($ingredients as $ing)
                    <tr>
                        <td>{{$ing->name}}</td>
                        <td><a href="#" id="editbtn" name="editbtn" class="btn btn-sm btn-outline-primary" data-id="{{$ing->id}}" data-name="{{$ing->name}}" >Edit</a></td>
                        <form action="#" method="post">
                           <td><a href="#" id="deletebtn" name="deletebtn" class="btn btn-sm btn-outline-danger" data-id="{{$ing->id}}" data-name="{{$ing->name}}">Del</a></td>
                    </form>
                    </tr>
                    @endforeach 
                </table>