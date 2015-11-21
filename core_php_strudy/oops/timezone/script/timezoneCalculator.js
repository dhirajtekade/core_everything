<script type="text/javascript" language="javascript" >
    function fnLoad()
    { 
        var objLocalZone = new Date();
        var strLocalZone=''+objLocalZone; 

        var mySplitResult = strLocalZone.split(" ");

        var newLocalZone = mySplitResult[5].slice(0,mySplitResult[5].length-2) +':'+mySplitResult[5].slice(mySplitResult[5].length-2,mySplitResult[5].length);
        document.getElementById("hdnTimeZone").value = newLocalZone;
        //alert('Length : '+newLocalZone);
    }
</script>
<input type="button" value="Get your time zone" onclick="fnLoad();"/>
<input type="lable" id="hdnTimeZone" name="hdnTimeZone"/>