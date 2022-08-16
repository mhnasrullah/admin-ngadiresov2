const ham = document.getElementById('button-toggle');
const nav = document.getElementById('nav');

ham.addEventListener('click',()=>{
    nav.classList.toggle('n-show');
})

var sum = {
  placeholder: 'Tulis disini...',
  tabsize: 2,
  height: 120,
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline', 'clear']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['table', ['table']],
    ['insert', ['link', 'picture', 'video']],
    ['view', ['fullscreen', 'codeview', 'help']]
  ]
}

$('#summernote').summernote(sum);
$('#sntentangdesa').summernote(sum);
$('#snsambutankades').summernote(sum);
$('#snsetirta').summernote(sum);
$('#snsedesa').summernote(sum);

document.querySelectorAll('.btn-outline-danger').forEach(
  (e)=>{
    e.addEventListener('click',(ev)=>{
      if(confirm('Apakah anda ingin menghapus data ini?')){
        return true;
      }else{
        ev.preventDefault();
        ev.stopPropagation();
        return false;
      }
  })
})

  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})