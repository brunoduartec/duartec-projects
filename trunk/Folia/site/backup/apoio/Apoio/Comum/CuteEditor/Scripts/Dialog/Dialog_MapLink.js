var OxO664a=["inp_src","inp_title","inp_target","sel_protocol","btnbrowse","editor","","href","value","title","target","onclick","length","options","://",":","others","selectedIndex"];var inp_src=Window_GetElement(window,OxO664a[0],true);var inp_title=Window_GetElement(window,OxO664a[1],true);var inp_target=Window_GetElement(window,OxO664a[2],true);var sel_protocol=Window_GetElement(window,OxO664a[3],true);var btnbrowse=Window_GetElement(window,OxO664a[4],true);var obj=Window_GetDialogArguments(window);var editor=obj[OxO664a[5]];SyncToView();function SyncToView(){var src=obj[OxO664a[7]].replace(/$\s*/,OxO664a[6]);Update_sel_protocol(src);inp_src[OxO664a[8]]=src;if(obj[OxO664a[9]]){inp_title[OxO664a[8]]=obj[OxO664a[9]];} ;if(obj[OxO664a[10]]){inp_target[OxO664a[8]]=obj[OxO664a[10]];} ;} ;btnbrowse[OxO664a[11]]=function btnbrowse_onclick(){function Ox354(Ox137){if(Ox137){inp_src[OxO664a[8]]=Ox137;} ;} ;editor.SetNextDialogWindow(window);if(Browser_IsSafari()){editor.ShowSelectFileDialog(Ox354,inp_src.value,inp_src);} else {editor.ShowSelectFileDialog(Ox354,inp_src.value);} ;} ;function sel_protocol_change(){var src=inp_src[OxO664a[8]].replace(/$\s*/,OxO664a[6]);for(var i=0;i<sel_protocol[OxO664a[13]][OxO664a[12]];i++){var Ox13b=sel_protocol[OxO664a[13]][i][OxO664a[8]];if(src.substr(0,Ox13b.length).toLowerCase()==Ox13b){src=src.substr(Ox13b.length,src[OxO664a[12]]-Ox13b[OxO664a[12]]);break ;} ;} ;var Ox437=src.indexOf(OxO664a[14]);if(Ox437!=-1){src=src.substr(Ox437+3,src[OxO664a[12]]-3-Ox437);} ;var Ox437=src.indexOf(OxO664a[15]);if(Ox437!=-1){src=src.substr(Ox437+1,src[OxO664a[12]]-1-Ox437);} ;var Ox438=sel_protocol[OxO664a[8]];if(Ox438==OxO664a[16]){Ox438=OxO664a[6];} ;inp_src[OxO664a[8]]=Ox438+src;} ;function Update_sel_protocol(src){var Ox43a=false;for(var i=0;i<sel_protocol[OxO664a[13]][OxO664a[12]];i++){var Ox13b=sel_protocol[OxO664a[13]][i][OxO664a[8]];if(src.substr(0,Ox13b.length).toLowerCase()==Ox13b){if(sel_protocol[OxO664a[17]]!=i){sel_protocol[OxO664a[17]]=i;} ;Ox43a=true;break ;} ;} ;if(!Ox43a){sel_protocol[OxO664a[17]]=sel_protocol[OxO664a[13]][OxO664a[12]]-1;} ;} ;function insert_link(){var arr= new Array();arr[0]=inp_src[OxO664a[8]];if(inp_target[OxO664a[8]]){arr[1]=inp_target[OxO664a[8]];} ;if(inp_title[OxO664a[8]]){arr[2]=inp_title[OxO664a[8]];} ;Window_SetDialogReturnValue(window,arr);Window_CloseDialog(window);} ;