var OxO9897=["outer","btnbrowse","inp_src","onclick","value","cssText","style","src","FileName"];var outer=Window_GetElement(window,OxO9897[0],true);var btnbrowse=Window_GetElement(window,OxO9897[1],true);var inp_src=Window_GetElement(window,OxO9897[2],true);btnbrowse[OxO9897[3]]=function btnbrowse_onclick(){function Ox354(Ox137){if(Ox137){inp_src[OxO9897[4]]=Ox137;} ;} ;editor.SetNextDialogWindow(window);editor.ShowSelectFileDialog(Ox354,inp_src.value);} ;UpdateState=function UpdateState_Media(){outer[OxO9897[6]][OxO9897[5]]=element[OxO9897[6]][OxO9897[5]];outer.mergeAttributes(element);if(element[OxO9897[7]]){outer[OxO9897[8]]=element[OxO9897[8]];} else {outer.removeAttribute(OxO9897[8]);} ;} ;SyncToView=function SyncToView_Media(){inp_src[OxO9897[4]]=element[OxO9897[8]];} ;SyncTo=function SyncTo_Media(element){element[OxO9897[8]]=inp_src[OxO9897[4]];} ;