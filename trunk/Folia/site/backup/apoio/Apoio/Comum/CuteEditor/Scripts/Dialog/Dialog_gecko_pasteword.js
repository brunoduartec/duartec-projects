var OxO8326=["onload","contentWindow","idSource","innerHTML","body","document","","designMode","on","contentEditable","fontFamily","style","Tahoma","fontSize","11px","color","black","background","white","length","\x22","\x3C$1$3"," ","\x26nbsp;","$1","\x3Ch$1\x3E","\x3C$1\x3E$2\x3C/$1\x3E"];var editor=Window_GetDialogArguments(window);function cancel(){Window_CloseDialog(window);} ;window[OxO8326[0]]=function (){var iframe=document.getElementById(OxO8326[2])[OxO8326[1]];iframe[OxO8326[5]][OxO8326[4]][OxO8326[3]]=OxO8326[6];iframe[OxO8326[5]][OxO8326[7]]=OxO8326[8];iframe[OxO8326[5]][OxO8326[4]][OxO8326[9]]=true;iframe[OxO8326[5]][OxO8326[4]][OxO8326[11]][OxO8326[10]]=OxO8326[12];iframe[OxO8326[5]][OxO8326[4]][OxO8326[11]][OxO8326[13]]=OxO8326[14];iframe[OxO8326[5]][OxO8326[4]][OxO8326[11]][OxO8326[15]]=OxO8326[16];iframe[OxO8326[5]][OxO8326[4]][OxO8326[11]][OxO8326[17]]=OxO8326[18];iframe.focus();} ;function insertContent(){var iframe=document.getElementById(OxO8326[2])[OxO8326[1]];var Oxc7=iframe[OxO8326[5]][OxO8326[4]][OxO8326[3]];if(Oxc7&&Oxc7[OxO8326[19]]>0){editor.PasteHTML(_RemoveWord(Oxc7));Window_CloseDialog(window);} ;} ;function _RemoveWord(Ox2b){Ox2b=Ox2b.replace(/<[\/]?(base|meta|link|style|font|st1|shape|path|lock|imagedata|stroke|formulas|xml|del|ins|[ovwxp]:\w+)[^>]*?>/gi,OxO8326[6]);Ox2b=Ox2b.replace(/\s*mso-[^:]+:[^;"]+;?/gi,OxO8326[6]);Ox2b=Ox2b.replace(/<!--[\s\S]*?-->/gi,OxO8326[6]);Ox2b=Ox2b.replace(/\s*MARGIN: 0cm 0cm 0pt\s*;/gi,OxO8326[6]);Ox2b=Ox2b.replace(/\s*MARGIN: 0cm 0cm 0pt\s*"/gi,OxO8326[20]);Ox2b=Ox2b.replace(/\s*TEXT-INDENT: 0cm\s*;/gi,OxO8326[6]);Ox2b=Ox2b.replace(/\s*TEXT-INDENT: 0cm\s*"/gi,OxO8326[20]);Ox2b=Ox2b.replace(/\s*TEXT-ALIGN: [^\s;]+;?"/gi,OxO8326[20]);Ox2b=Ox2b.replace(/\s*PAGE-BREAK-BEFORE: [^\s;]+;?"/gi,OxO8326[20]);Ox2b=Ox2b.replace(/\s*FONT-VARIANT: [^\s;]+;?"/gi,OxO8326[20]);Ox2b=Ox2b.replace(/\s*tab-stops:[^;"]*;?/gi,OxO8326[6]);Ox2b=Ox2b.replace(/\s*tab-stops:[^"]*/gi,OxO8326[6]);Ox2b=Ox2b.replace(/<(\w[^>]*) class=([^ |>]*)([^>]*)/gi,OxO8326[21]);Ox2b=Ox2b.replace(/\s*style="\s*"/gi,OxO8326[6]);Ox2b=Ox2b.replace(/<SPAN\s*[^>]*>\s* \s*<\/SPAN>/gi,OxO8326[22]);Ox2b=Ox2b.replace(/<(\w+)[^>]*\sstyle="[^"]*DISPLAY\s?:\s?none(.*?)<\/\1>/ig,OxO8326[6]);Ox2b=Ox2b.replace(/<span\s*[^>]*>\s*&nbsp;\s*<\/span>/gi,OxO8326[23]);Ox2b=Ox2b.replace(/<SPAN\s*[^>]*><\/SPAN>/gi,OxO8326[6]);Ox2b=Ox2b.replace(/<(\w[^>]*) lang=([^ |>]*)([^>]*)/gi,OxO8326[21]);Ox2b=Ox2b.replace(/<SPAN\s*>(.*?)<\/SPAN>/gi,OxO8326[24]);Ox2b=Ox2b.replace(/<\/?\w+:[^>]*>/gi,OxO8326[6]);Ox2b=Ox2b.replace(/<\!--.*?-->/g,OxO8326[6]);Ox2b=Ox2b.replace(/<H\d>\s*<\/H\d>/gi,OxO8326[6]);Ox2b=Ox2b.replace(/<(\w[^>]*) language=([^ |>]*)([^>]*)/gi,OxO8326[21]);Ox2b=Ox2b.replace(/<(\w[^>]*) onmouseover="([^\"]*)"([^>]*)/gi,OxO8326[21]);Ox2b=Ox2b.replace(/<(\w[^>]*) onmouseout="([^\"]*)"([^>]*)/gi,OxO8326[21]);Ox2b=Ox2b.replace(/<H(\d)([^>]*)>/gi,OxO8326[25]);Ox2b=Ox2b.replace(/<(H\d)><FONT[^>]*>(.*?)<\/FONT><\/\1>/gi,OxO8326[26]);Ox2b=Ox2b.replace(/<(H\d)><EM>(.*?)<\/EM><\/\1>/gi,OxO8326[26]);Ox2b=Ox2b.replace(/<a name="?OLE_LINK\d+"?>((.|[\r\n])*?)<\/a>/gi,OxO8326[24]);Ox2b=Ox2b.replace(/<a name="?_Hlt\d+"?>((.|[\r\n])*?)<\/a>/gi,OxO8326[24]);Ox2b=Ox2b.replace(/<a name="?_Toc\d+"?>((.|[\r\n])*?)<\/a>/gi,OxO8326[24]);return Ox2b;} ;