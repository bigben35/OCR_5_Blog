$(document).ready(function() {
    $('.delete').click(function(){    
    let answer = confirm('Êtes-vous sûr de vouloir supprimer ?');
    return answer;
    });
  });