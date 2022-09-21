$(document).ready(function() {
    $('.delete').click(function(){    
    let answer = confirm('Êtes-vous sûr de vouloir supprimer ?');
    return answer;
    });
  });


  $(document).ready(function() {
    $('.validate').click(function(){    
		let answer = confirm('Êtes-vous sûr de vouloir valider le commentaire ?');
		return answer;
  });
});