var OxO2429=["ua","userAgent","isOpera","opera","isSafari","safari","isGecko","gecko","isWinIE","msie","compatMode","document","CSS1Compat","undefined","Microsoft.XMLHTTP","readyState","onreadystatechange","","length","all","childNodes","nodeType","\x0D\x0A","caller","onchange","oninitialized","command","commandui","commandvalue","returnValue","oncommand","string","_fireEventFunction","event","parentNode","_IsCuteEditor","True","readOnly","_IsRichDropDown","null","value","selectedIndex","nodeName","TR","cells","display","style","nextSibling","innerHTML","\x3Cimg src=\x22","/Load.ashx?type=image\x26file=t-minus.gif\x22\x3E","onclick","CuteEditor_CollapseTreeDropDownItem(this,\x22","\x22)","onmousedown","none","/Load.ashx?type=image\x26file=t-plus.gif\x22\x3E","CuteEditor_ExpandTreeDropDownItem(this,\x22","contains","UNSELECTABLE","on","tabIndex","-1","//TODO: event not found? throw error ?","contentWindow","contentDocument","parentWindow","id","frames","frameElement","//TODO:frame contentWindow not found?","preventDefault","arguments","parent","top","opener","srcElement","target","//TODO: srcElement not found? throw error ?","fromElement","relatedTarget","toElement","keyCode","clientX","clientY","offsetX","offsetY","button","ctrlKey","altKey","shiftKey","cancelBubble","stopPropagation","CuteEditor_GetEditor(this).ExecImageCommand(this.getAttribute(\x27Command\x27),this.getAttribute(\x27CommandUI\x27),this.getAttribute(\x27CommandArgument\x27),this)","CuteEditor_GetEditor(this).PostBack(this.getAttribute(\x27Command\x27))","this.onmouseout();CuteEditor_GetEditor(this).DropMenu(this.getAttribute(\x27Group\x27),this)","ResourceDir","Theme","/Load.ashx?type=theme\x26theme=","\x26file=all.png","/Images/blank2020.gif","IMG","alt","title","Command","Group","ThemeIndex","width","20px","height","src","backgroundImage","url(",")","backgroundPosition","0 -","px","onload","className","separator","CuteEditorButton","onmouseover","CuteEditor_ButtonCommandOver(this)","onmouseout","CuteEditor_ButtonCommandOut(this)","CuteEditor_ButtonCommandDown(this)","onmouseup","CuteEditor_ButtonCommandUp(this)","oncontextmenu","ondragstart","PostBack","ondblclick","_ToolBarID","_CodeViewToolBarID","_FrameID"," CuteEditorFrame"," CuteEditorToolbar","ActiveTab","Edit","Code","View","buttonInitialized","isover","CuteEditorButtonOver","CuteEditorButtonDown","CuteEditorDown","border","solid 1px #0A246A","backgroundColor","#b6bdd2","padding","1px","solid 1px #f5f5f4","inset 1px","IsCommandDisabled","CuteEditorButtonDisabled","IsCommandActive","CuteEditorButtonActive","cmd_fromfullpage","(","href","location",",DanaInfo=",",","+","scriptProperties","GetScriptProperty","/Load.ashx?type=scripts\x26file=Opera_Implementation","CuteEditorImplementation","function","POST","\x26getModified=1","status","Failed to load impl time!","GET","\x26modified=","responseText","Failed to load impl code!","block","contentEditable","body"," \x3Cbr /\x3E ","designMode","cursor","InitializeCode","CuteEditorInitialize"];var _Browser_TypeInfo=null;function Browser__InitType(){if(_Browser_TypeInfo!=null){return ;} ;var Ox4={};Ox4[OxO2429[0]]=navigator[OxO2429[1]].toLowerCase();Ox4[OxO2429[2]]=(Ox4[OxO2429[0]].indexOf(OxO2429[3])>-1);Ox4[OxO2429[4]]=(Ox4[OxO2429[0]].indexOf(OxO2429[5])>-1);Ox4[OxO2429[6]]=(!Ox4[OxO2429[2]]&&Ox4[OxO2429[0]].indexOf(OxO2429[7])>-1);Ox4[OxO2429[8]]=(!Ox4[OxO2429[2]]&&Ox4[OxO2429[0]].indexOf(OxO2429[9])>-1);_Browser_TypeInfo=Ox4;} ;Browser__InitType();function Browser_IsWinIE(){return _Browser_TypeInfo[OxO2429[8]];} ;function Browser_IsGecko(){return _Browser_TypeInfo[OxO2429[6]];} ;function Browser_IsOpera(){return _Browser_TypeInfo[OxO2429[2]];} ;function Browser_IsSafari(){return _Browser_TypeInfo[OxO2429[4]];} ;function Browser_UseIESelection(){return _Browser_TypeInfo[OxO2429[8]];} ;function Browser_IsCSS1Compat(){return window[OxO2429[11]][OxO2429[10]]==OxO2429[12];} ;function CreateXMLHttpRequest(){try{if( typeof (XMLHttpRequest)!=OxO2429[13]){return  new XMLHttpRequest();} ;if( typeof (ActiveXObject)!=OxO2429[13]){return  new ActiveXObject(OxO2429[14]);} ;} catch(x){return null;} ;} ;function LoadXMLAsync(Oxa1a,Ox280,Ox22b,Oxa1b){var Oxe0=CreateXMLHttpRequest();function Oxa1c(){if(Oxe0[OxO2429[15]]!=4){return ;} ;Oxe0[OxO2429[16]]= new Function();var Ox288=Oxe0;Oxe0=null;Ox22b(Ox288);} ;Oxe0[OxO2429[16]]=Oxa1c;Oxe0.open(Oxa1a,Ox280,true);Oxe0.send(Oxa1b||OxO2429[17]);} ;function Element_GetAllElements(p){var arr=[];if(Browser_IsWinIE()){for(var i=0;i<p[OxO2429[19]][OxO2429[18]];i++){arr.push(p[OxO2429[19]].item(i));} ;return arr;} ;Ox238(p);function Ox238(Ox27){var Ox239=Ox27[OxO2429[20]];var Ox11=Ox239[OxO2429[18]];for(var i=0;i<Ox11;i++){var n=Ox239.item(i);if(n[OxO2429[21]]!=1){continue ;} ;arr.push(n);Ox238(n);} ;} ;return arr;} ;var __ISDEBUG=false;function Debug_Todo(msg){if(!__ISDEBUG){return ;} ;throw ( new Error(msg+OxO2429[22]+Debug_Todo[OxO2429[23]]));} ;function Window_GetElement(Ox1a1,Ox93,Ox236){var Ox27=Ox1a1[OxO2429[11]].getElementById(Ox93);if(Ox27){return Ox27;} ;var Ox2f=Ox1a1[OxO2429[11]].getElementsByName(Ox93);if(Ox2f[OxO2429[18]]>0){return Ox2f.item(0);} ;return null;} ;function CuteEditor_AddMainMenuItems(Ox660){} ;function CuteEditor_AddDropMenuItems(Ox660,Ox667){} ;function CuteEditor_AddTagMenuItems(Ox660,Ox669){} ;function CuteEditor_AddVerbMenuItems(Ox660,Ox669){} ;function CuteEditor_OnInitialized(editor){} ;function CuteEditor_OnCommand(editor,Ox66d,Ox66e,Ox4e){} ;function CuteEditor_OnChange(editor){} ;function CuteEditor_FilterCode(editor,Ox262){return Ox262;} ;function CuteEditor_FilterHTML(editor,Ox27a){return Ox27a;} ;function CuteEditor_FireChange(editor){window.CuteEditor_OnChange(editor);CuteEditor_FireEvent(editor,OxO2429[24],null);} ;function CuteEditor_FireInitialized(editor){window.CuteEditor_OnInitialized(editor);CuteEditor_FireEvent(editor,OxO2429[25],null);} ;function CuteEditor_FireCommand(editor,Ox66d,Ox66e,Ox4e){var Ox137=window.CuteEditor_OnCommand(editor,Ox66d,Ox66e,Ox4e);if(Ox137==true){return true;} ;var Ox675={};Ox675[OxO2429[26]]=Ox66d;Ox675[OxO2429[27]]=Ox66e;Ox675[OxO2429[28]]=Ox4e;Ox675[OxO2429[29]]=true;CuteEditor_FireEvent(editor,OxO2429[30],Ox675);if(Ox675[OxO2429[29]]==false){return true;} ;} ;function CuteEditor_FireEvent(editor,Ox677,Ox678){if(Ox678==null){Ox678={};} ;var Ox679=editor.getAttribute(Ox677);if(Ox679){if( typeof (Ox679)==OxO2429[31]){editor[OxO2429[32]]= new Function(OxO2429[33],Ox679);} else {editor[OxO2429[32]]=Ox679;} ;editor._fireEventFunction(Ox678);} ;} ;function CuteEditor_GetEditor(element){for(var Ox42=element;Ox42!=null;Ox42=Ox42[OxO2429[34]]){if(Ox42.getAttribute(OxO2429[35])==OxO2429[36]){return Ox42;} ;} ;return null;} ;function CuteEditor_DropDownCommand(element,Oxa1e){var editor=CuteEditor_GetEditor(element);if(editor[OxO2429[37]]){return ;} ;if(element.getAttribute(OxO2429[38])==OxO2429[36]){var Ox13b=element.GetValue();if(Ox13b==OxO2429[39]){Ox13b=OxO2429[17];} ;var Ox1fa=element.GetText();if(Ox1fa==OxO2429[39]){Ox1fa=OxO2429[17];} ;element.SetSelectedIndex(0);editor.ExecCommand(Oxa1e,false,Ox13b,Ox1fa);} else {if(element[OxO2429[40]]){var Ox13b=element[OxO2429[40]];if(Ox13b==OxO2429[39]){Ox13b=OxO2429[17];} ;element[OxO2429[41]]=0;editor.ExecCommand(Oxa1e,false,Ox13b,Ox1fa);} else {element[OxO2429[41]]=0;} ;} ;editor.FocusDocument();} ;function CuteEditor_ExpandTreeDropDownItem(src,Ox737){var Oxb3=null;while(src!=null){if(src[OxO2429[42]]==OxO2429[43]){Oxb3=src;break ;} ;src=src[OxO2429[34]];} ;var Ox1dd=Oxb3[OxO2429[44]].item(0);Oxb3[OxO2429[47]][OxO2429[46]][OxO2429[45]]=OxO2429[17];Ox1dd[OxO2429[48]]=OxO2429[49]+Ox737+OxO2429[50];Oxb3[OxO2429[51]]= new Function(OxO2429[52]+Ox737+OxO2429[53]);Oxb3[OxO2429[54]]= new Function(OxO2429[52]+Ox737+OxO2429[53]);} ;function CuteEditor_CollapseTreeDropDownItem(src,Ox737){var Oxb3=null;while(src!=null){if(src[OxO2429[42]]==OxO2429[43]){Oxb3=src;break ;} ;src=src[OxO2429[34]];} ;var Ox1dd=Oxb3[OxO2429[44]].item(0);Oxb3[OxO2429[47]][OxO2429[46]][OxO2429[45]]=OxO2429[55];Ox1dd[OxO2429[48]]=OxO2429[49]+Ox737+OxO2429[56];Oxb3[OxO2429[51]]= new Function(OxO2429[57]+Ox737+OxO2429[53]);Oxb3[OxO2429[54]]= new Function(OxO2429[57]+Ox737+OxO2429[53]);} ;function Element_Contains(element,Ox17c){if(!Browser_IsOpera()){if(element[OxO2429[58]]){return element.contains(Ox17c);} ;} ;for(;Ox17c!=null;Ox17c=Ox17c[OxO2429[34]]){if(element==Ox17c){return true;} ;} ;return false;} ;function Element_SetUnselectable(element){element.setAttribute(OxO2429[59],OxO2429[60]);element.setAttribute(OxO2429[61],OxO2429[62]);var arr=Element_GetAllElements(element);var len=arr[OxO2429[18]];if(!len){return ;} ;for(var i=0;i<len;i++){arr[i].setAttribute(OxO2429[59],OxO2429[60]);arr[i].setAttribute(OxO2429[61],OxO2429[62]);} ;} ;function Event_GetEvent(Ox23c){Ox23c=Event_FindEvent(Ox23c);if(Ox23c==null){Debug_Todo(OxO2429[63]);} ;return Ox23c;} ;function Frame_GetContentWindow(Ox340){if(Ox340[OxO2429[64]]){return Ox340[OxO2429[64]];} ;if(Ox340[OxO2429[65]]){if(Ox340[OxO2429[65]][OxO2429[66]]){return Ox340[OxO2429[65]][OxO2429[66]];} ;} ;var Ox1a1;if(Ox340[OxO2429[67]]){Ox1a1=window[OxO2429[68]][Ox340[OxO2429[67]]];if(Ox1a1){return Ox1a1;} ;} ;var len=window[OxO2429[68]][OxO2429[18]];for(var i=0;i<len;i++){Ox1a1=window[OxO2429[68]][i];if(Ox1a1[OxO2429[69]]==Ox340){return Ox1a1;} ;if(Ox1a1[OxO2429[11]]==Ox340[OxO2429[65]]){return Ox1a1;} ;} ;Debug_Todo(OxO2429[70]);} ;function Array_IndexOf(arr,Ox23e){for(var i=0;i<arr[OxO2429[18]];i++){if(arr[i]==Ox23e){return i;} ;} ;return -1;} ;function Array_Contains(arr,Ox23e){return Array_IndexOf(arr,Ox23e)!=-1;} ;function Event_FindEvent(Ox23c){if(Ox23c&&Ox23c[OxO2429[71]]){return Ox23c;} ;if(Browser_IsGecko()){return Event_FindEvent_FindEventFromCallers();} else {if(window[OxO2429[33]]){return window[OxO2429[33]];} ;return Event_FindEvent_FindEventFromWindows();} ;return null;} ;function Event_FindEvent_FindEventFromCallers(){var Ox188=Event_GetEvent[OxO2429[23]];for(var i=0;i<100;i++){if(!Ox188){break ;} ;var Ox23c=Ox188[OxO2429[72]][0];if(Ox23c&&Ox23c[OxO2429[71]]){return Ox23c;} ;Ox188=Ox188[OxO2429[23]];} ;} ;function Event_FindEvent_FindEventFromWindows(){var arr=[];return Ox245(window);function Ox245(Ox1a1){if(Ox1a1==null){return null;} ;if(Ox1a1[OxO2429[33]]){return Ox1a1[OxO2429[33]];} ;if(Array_Contains(arr,Ox1a1)){return null;} ;arr.push(Ox1a1);var Ox246=[];if(Ox1a1[OxO2429[73]]!=Ox1a1){Ox246.push(Ox1a1.parent);} ;if(Ox1a1[OxO2429[74]]!=Ox1a1[OxO2429[73]]){Ox246.push(Ox1a1.top);} ;if(Ox1a1[OxO2429[75]]){Ox246.push(Ox1a1.opener);} ;for(var i=0;i<Ox1a1[OxO2429[68]][OxO2429[18]];i++){Ox246.push(Ox1a1[OxO2429[68]][i]);} ;for(var i=0;i<Ox246[OxO2429[18]];i++){try{var Ox23c=Ox245(Ox246[i]);if(Ox23c){return Ox23c;} ;} catch(x){} ;} ;return null;} ;} ;function Event_GetSrcElement(Ox23c){Ox23c=Event_GetEvent(Ox23c);if(Ox23c[OxO2429[76]]){return Ox23c[OxO2429[76]];} ;if(Ox23c[OxO2429[77]]){return Ox23c[OxO2429[77]];} ;Debug_Todo(OxO2429[78]);return null;} ;function Event_GetFromElement(Ox23c){Ox23c=Event_GetEvent(Ox23c);if(Ox23c[OxO2429[79]]){return Ox23c[OxO2429[79]];} ;if(Ox23c[OxO2429[80]]){return Ox23c[OxO2429[80]];} ;return null;} ;function Event_GetToElement(Ox23c){Ox23c=Event_GetEvent(Ox23c);if(Ox23c[OxO2429[81]]){return Ox23c[OxO2429[81]];} ;if(Ox23c[OxO2429[80]]){return Ox23c[OxO2429[80]];} ;return null;} ;function Event_GetKeyCode(Ox23c){Ox23c=Event_GetEvent(Ox23c);return Ox23c[OxO2429[82]];} ;function Event_GetClientX(Ox23c){Ox23c=Event_GetEvent(Ox23c);return Ox23c[OxO2429[83]];} ;function Event_GetClientY(Ox23c){Ox23c=Event_GetEvent(Ox23c);return Ox23c[OxO2429[84]];} ;function Event_GetOffsetX(Ox23c){Ox23c=Event_GetEvent(Ox23c);return Ox23c[OxO2429[85]];} ;function Event_GetOffsetY(Ox23c){Ox23c=Event_GetEvent(Ox23c);return Ox23c[OxO2429[86]];} ;function Event_IsLeftButton(Ox23c){Ox23c=Event_GetEvent(Ox23c);if(Browser_IsWinIE()){return Ox23c[OxO2429[87]]==1;} ;if(Browser_IsGecko()){return Ox23c[OxO2429[87]]==0;} ;return Ox23c[OxO2429[87]]==0;} ;function Event_IsCtrlKey(Ox23c){Ox23c=Event_GetEvent(Ox23c);return Ox23c[OxO2429[88]];} ;function Event_IsAltKey(Ox23c){Ox23c=Event_GetEvent(Ox23c);return Ox23c[OxO2429[89]];} ;function Event_IsShiftKey(Ox23c){Ox23c=Event_GetEvent(Ox23c);return Ox23c[OxO2429[90]];} ;function Event_PreventDefault(Ox23c){Ox23c=Event_GetEvent(Ox23c);Ox23c[OxO2429[29]]=false;if(Ox23c[OxO2429[71]]){Ox23c.preventDefault();} ;} ;function Event_CancelBubble(Ox23c){Ox23c=Event_GetEvent(Ox23c);Ox23c[OxO2429[91]]=true;if(Ox23c[OxO2429[92]]){Ox23c.stopPropagation();} ;return false;} ;function Event_CancelEvent(Ox23c){Ox23c=Event_GetEvent(Ox23c);Event_PreventDefault(Ox23c);return Event_CancelBubble(Ox23c);} ;function CuteEditor_BasicInitialize(editor){var Ox151=Browser_IsOpera();var Ox700= new Function(OxO2429[93]);var Oxa22= new Function(OxO2429[94]);var Oxa23= new Function(OxO2429[95]);var Oxa24=editor.GetScriptProperty(OxO2429[96]);var Oxa25=editor.GetScriptProperty(OxO2429[97]);var Oxa26=Oxa24+OxO2429[98]+Oxa25+OxO2429[99];var Oxa27=Oxa24+OxO2429[100];var images=editor.getElementsByTagName(OxO2429[101]);var len=images[OxO2429[18]];for(var i=0;i<len;i++){var img=images[i];if(img.getAttribute(OxO2429[102])&&!img.getAttribute(OxO2429[103])){img.setAttribute(OxO2429[103],img.getAttribute(OxO2429[102]));} ;var Ox12e=img.getAttribute(OxO2429[104]);var Ox667=img.getAttribute(OxO2429[105]);var Oxa28=img.getAttribute(OxO2429[106]);if(parseInt(Oxa28)>=0){img[OxO2429[46]][OxO2429[107]]=OxO2429[108];img[OxO2429[46]][OxO2429[109]]=OxO2429[108];img[OxO2429[110]]=Oxa27;img[OxO2429[46]][OxO2429[111]]=OxO2429[112]+Oxa26+OxO2429[113];img[OxO2429[46]][OxO2429[114]]=OxO2429[115]+(Oxa28*20)+OxO2429[116];img[OxO2429[46]][OxO2429[45]]=OxO2429[17];} ;if(!Ox12e&&!Ox667){if(Ox151){img[OxO2429[117]]=CuteEditor_OperaHandleImageLoaded;} ;continue ;} ;if(img[OxO2429[118]]!=OxO2429[119]){img[OxO2429[118]]=OxO2429[120];img[OxO2429[121]]= new Function(OxO2429[122]);img[OxO2429[123]]= new Function(OxO2429[124]);img[OxO2429[54]]= new Function(OxO2429[125]);img[OxO2429[126]]= new Function(OxO2429[127]);} ;if(!img[OxO2429[128]]){img[OxO2429[128]]=Event_CancelEvent;} ;if(!img[OxO2429[129]]){img[OxO2429[129]]=Event_CancelEvent;} ;if(Ox12e){var Ox188=img.getAttribute(OxO2429[130])==OxO2429[36]?Oxa22:Ox700;if(img[OxO2429[51]]==null){img[OxO2429[51]]=Ox188;} ;if(img[OxO2429[131]]==null){img[OxO2429[131]]=Ox188;} ;} else {if(Ox667){if(img[OxO2429[51]]==null){img[OxO2429[51]]=Oxa23;} ;} ;} ;} ;var Ox76d=Window_GetElement(window,editor.GetScriptProperty(OxO2429[132]),true);var Ox76e=Window_GetElement(window,editor.GetScriptProperty(OxO2429[133]),true);var Ox769=Window_GetElement(window,editor.GetScriptProperty(OxO2429[134]),true);Ox769[OxO2429[118]]+=OxO2429[135];Ox76d[OxO2429[118]]+=OxO2429[136];Ox76e[OxO2429[118]]+=OxO2429[136];Element_SetUnselectable(Ox76d);Element_SetUnselectable(Ox76e);var Ox7ed=editor.GetScriptProperty(OxO2429[137]);switch(Ox7ed){case OxO2429[138]:Ox76d[OxO2429[46]][OxO2429[45]]=OxO2429[17];break ;;case OxO2429[139]:Ox76e[OxO2429[46]][OxO2429[45]]=OxO2429[17];break ;;case OxO2429[140]:break ;;} ;} ;function CuteEditor_OperaHandleImageLoaded(){var img=this;if(img[OxO2429[46]][OxO2429[45]]){img[OxO2429[46]][OxO2429[45]]=OxO2429[55];setTimeout(function Oxa2a(){img[OxO2429[46]][OxO2429[45]]=OxO2429[17];} ,1);} ;} ;function CuteEditor_ButtonOver(element){if(!element[OxO2429[141]]){element[OxO2429[128]]=Event_CancelEvent;element[OxO2429[123]]=CuteEditor_ButtonOut;element[OxO2429[54]]=CuteEditor_ButtonDown;element[OxO2429[126]]=CuteEditor_ButtonUp;Element_SetUnselectable(element);element[OxO2429[141]]=true;} ;element[OxO2429[142]]=true;element[OxO2429[118]]=OxO2429[143];} ;function CuteEditor_ButtonOut(){var element=this;element[OxO2429[118]]=OxO2429[120];element[OxO2429[142]]=false;} ;function CuteEditor_ButtonDown(){if(!Event_IsLeftButton()){return ;} ;var element=this;element[OxO2429[118]]=OxO2429[144];} ;function CuteEditor_ButtonUp(){if(!Event_IsLeftButton()){return ;} ;var element=this;if(element[OxO2429[142]]){element[OxO2429[118]]=OxO2429[143];} else {element[OxO2429[118]]=OxO2429[145];} ;} ;function CuteEditor_ColorPicker_ButtonOver(element){if(!element[OxO2429[141]]){element[OxO2429[128]]=Event_CancelEvent;element[OxO2429[123]]=CuteEditor_ColorPicker_ButtonOut;element[OxO2429[54]]=CuteEditor_ColorPicker_ButtonDown;Element_SetUnselectable(element);element[OxO2429[141]]=true;} ;element[OxO2429[142]]=true;element[OxO2429[46]][OxO2429[146]]=OxO2429[147];element[OxO2429[46]][OxO2429[148]]=OxO2429[149];element[OxO2429[46]][OxO2429[150]]=OxO2429[151];} ;function CuteEditor_ColorPicker_ButtonOut(){var element=this;element[OxO2429[142]]=false;element[OxO2429[46]][OxO2429[146]]=OxO2429[152];element[OxO2429[46]][OxO2429[148]]=OxO2429[17];element[OxO2429[46]][OxO2429[150]]=OxO2429[151];} ;function CuteEditor_ColorPicker_ButtonDown(){var element=this;element[OxO2429[46]][OxO2429[146]]=OxO2429[153];element[OxO2429[46]][OxO2429[148]]=OxO2429[17];element[OxO2429[46]][OxO2429[150]]=OxO2429[151];} ;function CuteEditor_ButtonCommandOver(element){element[OxO2429[142]]=true;if(element[OxO2429[154]]){element[OxO2429[118]]=OxO2429[155];} else {element[OxO2429[118]]=OxO2429[143];} ;} ;function CuteEditor_ButtonCommandOut(element){element[OxO2429[142]]=false;if(element[OxO2429[156]]){element[OxO2429[118]]=OxO2429[157];} else {if(element[OxO2429[154]]){element[OxO2429[118]]=OxO2429[155];} else {if(element[OxO2429[67]]!=OxO2429[158]){element[OxO2429[118]]=OxO2429[120];} ;} ;} ;} ;function CuteEditor_ButtonCommandDown(element){if(!Event_IsLeftButton()){return ;} ;element[OxO2429[118]]=OxO2429[144];} ;function CuteEditor_ButtonCommandUp(element){if(!Event_IsLeftButton()){return ;} ;if(element[OxO2429[154]]){element[OxO2429[118]]=OxO2429[155];return ;} ;if(element[OxO2429[142]]){element[OxO2429[118]]=OxO2429[143];} else {if(element[OxO2429[156]]){element[OxO2429[118]]=OxO2429[157];} else {element[OxO2429[118]]=OxO2429[120];} ;} ;} ;var CuteEditorGlobalFunctions=[CuteEditor_GetEditor,CuteEditor_ButtonOver,CuteEditor_ButtonOut,CuteEditor_ButtonDown,CuteEditor_ButtonUp,CuteEditor_ColorPicker_ButtonOver,CuteEditor_ColorPicker_ButtonOut,CuteEditor_ColorPicker_ButtonDown,CuteEditor_ButtonCommandOver,CuteEditor_ButtonCommandOut,CuteEditor_ButtonCommandDown,CuteEditor_ButtonCommandUp,CuteEditor_DropDownCommand,CuteEditor_ExpandTreeDropDownItem,CuteEditor_CollapseTreeDropDownItem,CuteEditor_OnInitialized,CuteEditor_OnCommand,CuteEditor_OnChange,CuteEditor_AddVerbMenuItems,CuteEditor_AddTagMenuItems,CuteEditor_AddMainMenuItems,CuteEditor_AddDropMenuItems,CuteEditor_FilterCode,CuteEditor_FilterHTML];function SetupCuteEditorGlobalFunctions(){for(var i=0;i<CuteEditorGlobalFunctions[OxO2429[18]];i++){var Ox188=CuteEditorGlobalFunctions[i];var name=Ox188+OxO2429[17];name=name.substr(8,name.indexOf(OxO2429[159])-8).replace(/\s/g,OxO2429[17]);if(!window[name]){window[name]=Ox188;} ;} ;} ;SetupCuteEditorGlobalFunctions();var __danainfo=null;var danaurl=window[OxO2429[161]][OxO2429[160]];var danapos=danaurl.indexOf(OxO2429[162]);if(danapos!=-1){var pluspos1=danaurl.indexOf(OxO2429[163],danapos+10);var pluspos2=danaurl.indexOf(OxO2429[164],danapos+10);if(pluspos1!=-1&&pluspos1<pluspos2){pluspos2=pluspos1;} ;__danainfo=danaurl.substring(danapos,pluspos2)+OxO2429[164];} ;function CuteEditor_GetScriptProperty(name){var Ox13b=this[OxO2429[165]][name];if(Ox13b&&__danainfo){if(name==OxO2429[96]){return Ox13b+__danainfo;} ;var Ox379=this[OxO2429[165]][OxO2429[96]];if(Ox13b.substr(0,Ox379.length)==Ox379){return Ox379+__danainfo+Ox13b.substring(Ox379.length);} ;} ;return Ox13b;} ;function CuteEditor_SetScriptProperty(name,Ox13b){if(Ox13b==null){this[OxO2429[165]][name]=null;} else {this[OxO2429[165]][name]=String(Ox13b);} ;} ;function CuteEditorInitialize(Oxa35,Oxa36){var editor=Window_GetElement(window,Oxa35,true);editor[OxO2429[165]]=Oxa36;editor[OxO2429[166]]=CuteEditor_GetScriptProperty;var Ox769=Window_GetElement(window,editor.GetScriptProperty(OxO2429[134]),true);var editwin=Frame_GetContentWindow(Ox769);var editdoc=editwin[OxO2429[11]];var Oxa37=false;var Oxa38;var Oxa39=false;var Oxa3a=editor.GetScriptProperty(OxO2429[96])+OxO2429[167];function Oxa3b(){if( typeof (window[OxO2429[168]])==OxO2429[169]){return ;} ;LoadXMLAsync(OxO2429[170],Oxa3a+OxO2429[171],Oxa3c);} ;function Oxa3c(Ox288){if(Ox288[OxO2429[172]]!=200){alert(OxO2429[173]);return ;} ;LoadXMLAsync(OxO2429[174],Oxa3a+OxO2429[175]+Ox288[OxO2429[176]],Oxa3d);} ;function Oxa3d(Ox288){if(Ox288[OxO2429[172]]!=200){alert(OxO2429[177]);return ;} ;CuteEditorInstallScriptCode(Ox288.responseText,OxO2429[168]);if(Oxa37){Oxa3e();} ;} ;function Oxa3e(){if(Oxa39){return ;} ;Oxa39=true;Ox769[OxO2429[46]][OxO2429[45]]=OxO2429[178];if(Browser_IsOpera()){editdoc[OxO2429[180]][OxO2429[179]]=true;} else {if(Browser_IsGecko()){editdoc[OxO2429[180]][OxO2429[48]]=OxO2429[181];} ;editdoc[OxO2429[182]]=OxO2429[60];} ;window.CuteEditorImplementation(editor);try{editor[OxO2429[46]][OxO2429[183]]=OxO2429[17];} catch(x){} ;try{editdoc[OxO2429[180]][OxO2429[46]][OxO2429[183]]=OxO2429[17];} catch(x){} ;var Oxa3f=editor.GetScriptProperty(OxO2429[184]);if(Oxa3f){editor.Eval(Oxa3f);} ;} ;function Oxa40(){if(!Element_Contains(window[OxO2429[11]].body,editor)){return ;} ;try{Ox769=Window_GetElement(window,editor.GetScriptProperty(OxO2429[134]),true);editwin=Frame_GetContentWindow(Ox769);editdoc=editwin[OxO2429[11]];var y=editdoc[OxO2429[180]];} catch(x){setTimeout(Oxa40,100);return ;} ;if(!editdoc[OxO2429[180]]){setTimeout(Oxa40,100);return ;} ;if(!Oxa37){Oxa37=true;setTimeout(Oxa40,50);return ;} ;if( typeof (window[OxO2429[168]])==OxO2429[169]){Oxa3e();} else {} ;} ;CuteEditor_BasicInitialize(editor);Oxa3b();Oxa40();} ;function CuteEditorInstallScriptCode(Ox99b,Ox99c){eval(Ox99b);window[Ox99c]=eval(Ox99c);} ;window[OxO2429[185]]=CuteEditorInitialize;