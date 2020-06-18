(function(win,doc){
'use strict';
    function confirmDel(event){
        event.preventDefault();
        let url = event.target.parentNode.href;
        let token = doc.getElementsByName('_token')[0].value;
        if(confirm("Deseja realmente excluir o registro?")){
            let ajax = new XMLHttpRequest();
            ajax.open("DELETE",url);
            ajax.setRequestHeader('X-CSRF-TOKEN',token);
            ajax.onreadystatechange=function(){
                if(ajax.readyState===4 && ajax.status===200){
                    win.location.href="/";
                }
            }
            ajax.send();
        }else{
            return false;
        }
    }
    if(doc.querySelector('.btn-del')){
        let btn = doc.querySelectorAll('.btn-del');
        for(let i=0;i<btn.length;i++){
            btn[i].addEventListener('click',confirmDel,false);
        }
    }

})(window,document);