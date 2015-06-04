{{--*/$model  = User::all()/*--}}

@foreach($model as $m)

{{--*/$titles[] = $m->titlea;/*--}}
{{--*/$titles[] = $m->titleb;/*--}}
{{--*/$titles[] = $m->titlec;/*--}}

@endforeach

 <script type="text/javascript">
     $(document).ready(function($) { 
        var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;
 
    // an array that will be populated with substring matches
    matches = [];
 
    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');
 
    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });
 
    cb(matches);
  };
};
 
var states = [

@foreach($titles as $t)
	'{{$t}}',
@endforeach
'mega','nema'
];
 
$(' .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
});
     })
  </script>