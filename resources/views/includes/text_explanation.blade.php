<h2 >Algeria: the beautiful</h2>
<h3>Bismillah</h3>
<h3>Algeria_resful Web Api for getting Communes and Wilayaat in Algeria</h3>
<h3>This Api is made for dynamic loading for menus. We are currently working 
on fleshing out key functionality.</h3>
<br/>
<h2>Mission Statement</h2>
<h3>To offer web developers in Algeria, free & readily available access points to facilitate Web development.</h3>
<br/>

<button v-on:click="toggleIntro" >Show Use</button>
<div v-show="introduction" transition="expand">
<h4 class='intro' >
    Algeria_restful is merely an API to help Web Developers build better Websites that utilize city/region queries.<br/>
    <br/>
    When Calling the API, one can dynamically populate the Commune Menu, after the Wilaya is selected.<br/>
    After, the Commune can be selected & both the Commune & Wilaya relationship can be retrieved.<br/><br/>
    Developers using this in their forms, therefore only have to ask for the first line of the address of the user.

</h4>
@include('includes/api_explanation/api_explanation1')
</div>