
{!! Form::open(['url' => [$url, $id], 'method' => 'DELETE', 'style' => 'display:inline']) !!}
{!! Form::button('<i class="fa fa-trash" aria-hidden="true"/></i> Delete', array(
    'type' => 'submit',
    'class' => 'btn btn-danger btn-sm',
    'title' => 'Delete',
    'onclick'=>'return confirm("Confirm delete?")'
    ))
!!}
{!! Form::close() !!}
