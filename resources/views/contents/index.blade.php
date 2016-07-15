@extends('master')
@section('content')
<div class="box_p">
      <div class="titel_bar clear">
        <div class="p_titel">Content Management</div>
       
      </div>
      <div class="from_p"> 
      	<div class="res_table">
      	<table width="100%" cellspacing="0" cellpadding="0" border="0" class="table table-striped">
        <thead>
            <tr>
                <th>Content Title</th>
                <th>Content Body</th>
                <th class="tac">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($contents as $content)
        <tr>
            <td>{{$content->content_title}}</td>
            <td>{{strip_tags(substr ( $content->content_body,0 ,100 ))}} ....</td>
            <td class="tac action">
                <a class="marr15" title="Edit" href="{{url('content',$content->id)}}/edit"><i class="fa fa-edit fc_blue"></i></a>
                
            </td>                        
        </tr> 
        @endforeach
        </tbody>
    </table>
    	</div>
      </div>
    </div>
@stop

