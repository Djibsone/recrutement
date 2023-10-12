const btn = document.getElementById('_btn')
const listCand = document.getElementById('listCand')


$(document).ready(function() {
                
    $(document).on('click', '.liste', function(e){
        e.preventDefault();

        btn.style.display = "none";
        listCand.style.display = "block";
        
        setTimeout(() => {
            btn.style.display = "block";
            listCand.style.display = "none";
        }, 8000);

    });

})