
function StateSuggestions() {
this.states = 
[
"A K #CST00000007   8745000000","A K KARTHIK #CST00000087  ","A K KARTHIK #CSTCST00000087  ","A.A #CST00000004  7845000001","A.ALAMAN #CST00000062  9944388354","A.GAISER #CST00000081  9843739741","A.M.JAHUBAR SADIQE #CST00000065  9751403585","ABI MOBILE #CST00000010  9487426841","AJEEM AHAMED #CST00000076  9944778569","AJITH #CST90  9842116451","ALAMAN A #CST00000063  9080908044","ANBU #CST00000021  9384757575","ANU #CST00000054  9486738258","ARORA #CST00000015  7402333376","ASDGK #CST898  ","ASOKE #CST00000053  9629578773","B SHAJAN #CST00000008  8754635540","B.JEBASINGH #CST00000079  9994030021","BABU #CST00000056  9677508508","BABU #CST00000073  9894706884","BANU #CST00000045  9842685080","BENLEA.R #CST00000034  9940999212","BHARATHI #CST00000009  9854120000","BOY #CST00000064  9442761054","C.DAVID SUGI RAJ #CST00000074  9976666424","CELL CITY #CST00000014  9003338250","D.BIJI #CST00000070  9994535949","D.RAJESH #CST00000077  9443432681","DELIP #CST00000055  9487020001","DEVA #CST00000038  9489216601","DEVI #CST00000046  9446969559","FESHIKA #CST00000012  9486235593","FRANKLIN PRASANNA #CST00000058  9677791235","GOLDEN #CST00000002  7412350000","GRELET SUMAN #CST00000019  9865883336","J.SUJAI JACKSON #CST00000044  9487607867","JAHABAR SADIQ #CST00000072  9381810260","JAIN #CST00000075  9486989955","JAMAL #CST00000067  9790666606","KALA #CST00000059  9095681308","KANNIKAIMATHA #CST00000013  9992000001","KUMAR #CST00000006  7000000045","KUMAR #CST00000071  9042339019","KURINCHI #CST00000041  7202041605","M.JUSTUARAJ #CST00000078  8695557778","M.SALEEM #CST00000084  9025257479","MAHER SHALAL #CST00000069  9952247545","MAHESH #CST00000068  8870456201","MAHESH S #CST00000017  9865585118","MATHA #CST00000003  9542100032","MICAKIL #CST00000066  9003815188","MOHAMMED RAFIQ #CST00000022  8903939390","MUSTAG #CST00000051  9789438971","NANO #CST00000005  8124599587","NEENU #CST00000043  9789596637","NIZAR.M #CST00000061  9940773811","NOORIYA #CST00000036  9442828129","PANDYAN BRIJIT RUBEN #CST00000016  9486954646","PAOPULAR #CST00000040  9488291716","R.CHANDRASEKARAN #CST00000086  9944910378","R.JOHN SELVA KUMAR #CST00000085  9629849156","RAMA MOORTHY #CST00000050  9789214466","RAMAKRISHNA #CST00000057  9443507929","RAMESH #CST00000020  9789564674","RAMESH #CST00000025  9944843583","ROSHAN #CST00000039  9894936868","RUFUA JERALDING #CST00000048  9751606000","S.SATHEESH KUMAR #CST00000083  9486610366","SAM #CST00000082  9894216214","SASDA #CST00000088  ","SATHI #CST00000042  9442474174","SELF BEE #CST00000001  9943753611","SHAFEE #CST00000052  9994993494","SM.AGE #CST00000032  9488072787","SMART #CST00000031  9486578734","SOFT #CST00000030  9443005943","SOLOMAN #CST00000029  9443993288","STAR #CST00000047  9789575923","SUJITH #CST00000033  9843496140","SUNJAI #CST00000027  9443278655","SURESH #CST00000026  9751295228","THANGAM #CST00000011  9874500000","UDHYAM #CST00000037  9894483510","V.PRANESH #CST00000018  9043590086","VASANTHAM #CST00000028  9345206745","VIJAY #CST00000024  9487606981","VIJAYAN #CST00000023  7667772272","VIMALDARLEING #CST00000080  9688548716","VINNDY ANTO #CST00000049  9443432803","VIVEK #CST00000035  9344618306","Y.MICHEAL RAJ #CST00000060  9488009096"];
}

/**
 * Request suggestions for the given autosuggest control. 
 * @scope protected
 * @param oAutoSuggestControl The autosuggest control to provide suggestions for.
 */
StateSuggestions.prototype.requestSuggestions = function (oAutoSuggestControl /*:AutoSuggestControl*/,
                                                          bTypeAhead /*:boolean*/) {
    var aSuggestions = [];
    var sTextboxValue = oAutoSuggestControl.textbox.value;
    
 	var loopLength = 0;

    if (sTextboxValue.length > 0){
    
	var sTextboxValue = sTextboxValue.toUpperCase();

        //search for matching states
        for (var i=0; i < this.states.length; i++) 
		{ 
            if (this.states[i].indexOf(sTextboxValue) >= 0) 
			{
                loopLength = loopLength + 1;
				if (loopLength <= 15) //TO REDUCE THE SUGGESTIONS DROP DOWN LIST
				{
					aSuggestions.push(this.states[i]);
				}
            } 
        }
    }

    //provide suggestions to the control
    oAutoSuggestControl.autosuggest(aSuggestions, bTypeAhead);
};