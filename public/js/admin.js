ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );



function changeThumbnail(event,id){
  console.count();
  const file = event.target.files[0]
  const url = URL.createObjectURL(file);

  placeholder = document.querySelector(`#${id}`);
  placeholder.src = url;

}