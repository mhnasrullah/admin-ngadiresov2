const ham = document.getElementById('button-toggle');
const nav = document.getElementById('nav');

ham.addEventListener('click',()=>{
    nav.classList.toggle('n-show');
})

$('#summernote').summernote({
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
  });