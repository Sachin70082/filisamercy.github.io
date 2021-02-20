function init() 
{
  var input = document.getElementById('search-input');
  var autocomplete = new google.maps.places.Autocomplete(input);
  }

google.maps.event.addListener(autocomplete, 'place_changed', function(){
         var place = autocomplete.getPlace();
      })