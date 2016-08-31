<script>
    // number format function for currency in stats
    Number.prototype.formatMoney = function(c, d, t){
    var n = this, 
        c = isNaN(c = Math.abs(c)) ? 2 : c, 
        d = d == undefined ? "." : d, 
        t = t == undefined ? "," : t, 
        s = n < 0 ? "-" : "", 
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
        j = (j = i.length) > 3 ? j % 3 : 0;
       return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
     };
     
    function confirm_confirm_proposal(proposal_id){
        alertify.confirm( "Conferma", "Sei sicuro di volere approvare questa proposta? Da questo momento diventerà visibile.", 
            function () {
                // positive
                window.location.href = "/admin/proposals/confirm/"+proposal_id;
            }, 
            function() {
                ; // negative// do nothing 
            }
        );
    };
    
    function confirm_deactivate_proposal(proposal_id){
        alertify.confirm( "Conferma", "Vuoi contrassegnare questa proposta come NON idonea alla pubblicazione?", 
            function () {
                // positive
                window.location.href = "/admin/proposals/deactivate/"+proposal_id;
            }, 
            function() {
                ; // negative// do nothing 
            }
        );
    };

</script>
@yield('more_scripts')
@yield('more_scripts2')
@yield('more_scripts3')
@yield('more_scripts4')
@yield('more_scripts5')