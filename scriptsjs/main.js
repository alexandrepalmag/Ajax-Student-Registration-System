window.onload = searchData()

let fields = document.querySelectorAll("#modal-form [name]")
let student = {}


 document.getElementById('#modal-form').addEventListener('submit', function(e){
     e.preventDefault();

     fields.forEach(function (field, index) { 

        student[field.name] = field.value
    
     })

     console.log(student)     
     
 })

 /* $(document).ready(function () {
     $('#modal-btn-send').on('submit', function () {
         console.log('clicou')
     });
 }); */
