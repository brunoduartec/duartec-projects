%==============================================================================
% This is the ITA LateX class - classe de documento com padr�es do ITA
% written by
%              F�bio Fagundes Silveira   -  ffs [at] ita [dot] br
%
%              Benedito C. O. Maciel     -  bcmaciel [at] ita [dot] br
%              Giovani Volnei Meinertz   -  giovani [at] ita [dot] br
%
% last updated: 
%        $Id: ita.cls 42 2006-10-01 22:30:09Z ffs $
%        $HeadURL: file:///opt/repositorioITALUS/classeITA/tags/versao-2.1/ita.cls $
%
%
% Copyright (C) 2004-2008 ITALUS - ITA LaTeX Users Group "Society"  :-)
%
% This program is free software; you can redistribute it and/or modify
% it under the terms of the GNU General Public License as published by
% the Free Software Foundation; either version 2 of the License, or
% (at your option) any later version.
%
% This program is distributed in the hope that it will be useful,
% but WITHOUT ANY WARRANTY; without even the implied warranty of
% MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
% GNU General Public License for more details.
%
% You should have received a copy of the GNU General Public License
% along with this program; if not, write to the Free Software
% Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
%
% ITALUS
% Technological Institute of Aeronautics --- ITA
% Sao Jose dos Campos, Brazil
% HomePages:        http://www.comp.ita.br/italus
%                   http://groups.yahoo.com/group/italus/
% Discussion list: italus {at} yahoogroups.com
%==============================================================================

%==============================================================================
\NeedsTeXFormat{LaTeX2e}[1995/12/01]
\ProvidesClass{ita}[2006/03/10 v2.0 Classe de documento com padr�es do ITA]

% % --------------------------------------------------------------------
% %  Verifica��o se alvo ser� gerado pelo PDFLaTeX ou n�o
% % --------------------------------------------------------------------
\newif\ifpdf
  \ifx\pdfoutput\undefined
      \pdffalse
  \else
      \pdfoutput=1
      \pdftrue
 \fi

%==============================================================================
%%% Declaracao das opcoes
%==============================================================================
\DeclareOption{defaults}{
  \input{defaults.def}
}
% Mestrado
\DeclareOption{msc}{
  \input{msc.def}
}
% Doutorado
\DeclareOption{dsc}{
  \input{dsc.def}  
}
% Doutora
\DeclareOption{fem}{
  \input{fem.def}
}
% Exame de Qualificacao
\DeclareOption{quali}{
  \input{quali.def}  
}
% Versao em ingles
\newif\if@eng
\DeclareOption{eng}{
    \@engtrue
}
\DeclareOption{classic}{

    \newcommand{\itaformatworktitle}[1]{\Large \textbf{#1}}
    \newcommand{\itaformatauthorname}[1]{\large \textbf{#1}}
    \newcommand{\itaformattitletext}[1]{\large{#1}}
    \newcommand{\itaformatadvisorword}[1]{#1}

    \renewcommand{\itaspacing}{2}
}

%==============================================================================
%%% dv: 'draft version': imprime �Versao Preliminar� + data da impressao
%==============================================================================
\newif\if@dv
\DeclareOption{dv}{
    \@dvtrue
}

\ExecuteOptions{defaults,classic}
\ProcessOptions
\AtEndOfPackage{
    \renewcommand{\baselinestretch}{\itaspacing}
}
 
  
%==============================================================================
%%% Heranca e Pacotes ...
%==============================================================================
\LoadClass[12pt,a4paper,oneside]{book}
\RequirePackage{calc}
\RequirePackage{ifthen}

\if@eng
   \RequirePackage[english]{babel}
\else
   \RequirePackage[english,portuges,brazil]{babel}
\fi

 \if@eng
   \input{itaeng.babel}
 \else
   \input{itabr.babel}
 \fi

\RequirePackage[latin1]{inputenc}
\RequirePackage{setspace}
\RequirePackage{fancyhdr}
\RequirePackage{amsfonts}                 % Fontes p/ conjuntos: R,Z,H,...
\RequirePackage{lastpage}
\RequirePackage{indentfirst}
\RequirePackage{caption2}
\RequirePackage{longtable}
\RequirePackage{array}
\RequirePackage{tabularx}

%==============================================================================
%%% Gloss�rio
\usepackage{makeglo}
\renewcommand{\glossmaxlabelwidth}{\hspace{3cm}}

%% opcoes de cores
%% linkcolor=blue,citecolor=gray,urlcolor=cyan
\RequirePackage{color}        %% aplicar cores no texto
\RequirePackage{hyphenat}     %% hifeniza��o
\RequirePackage{makeidx}      %% �NDICE

%==============================================================================
%%% Hyperref
\definecolor{gray}{rgb}{0.4,0.4,0.4}
\definecolor{bblue}{rgb}{0,0,.8} %% tom azul mais escuro

\RequirePackage[debug,a4paper,pagebackref=true,breaklinks,bookmarksopen=true,colorlinks=true,linkcolor=bblue,citecolor=bblue,urlcolor=bblue,bookmarksnumbered=true,hyperindex=true,verbose=true]{hyperref} %% essencial %% gera pdf/dvi com links
%==============================================================================

\ifpdf
  \RequirePackage{ae} %% fontes para pdf
  \RequirePackage[pdftex]{graphicx}
  \RequirePackage[pdftex]{geometry}
\else
  \RequirePackage[T1]{fontenc}
  \RequirePackage[dvips]{graphicx}
  \RequirePackage[dvips]{geometry}
\fi

% dimensoes das paginas
\geometry{a4paper,left=3cm,right=2cm,top=3cm,bottom=2cm,verbose,headheight=0.56cm, headsep=0.5cm,footskip=3em}

\newif\ifhyperref
\@ifpackageloaded{hyperref}{\hyperreftrue}{\hyperreffalse}

%==============================================================================
%%% ABNTeX ...
\RequirePackage[alf,abnt-emphasize=bf,abnt-etal-list=0,abnt-etal-text=it]{abntcite}
%==============================================================================

%==============================================================================
% Redefini��o da data (para ter m�s e ano separados)
%==============================================================================
\renewcommand{\date}[2]{
        \gdef\@publmonth{#1}
        \gdef\@publyear{#2}
}
\date{\monthname}{\number\year}

%==============================================================================
%%% Novos comandos: \author, \authoraddress, \advisor, \coadvisor,
%%% \boss, etc ...  ;-)
%==============================================================================
% Autor...
\renewcommand{\author}[2]{%               % Nome, Sobrenome
  \gdef\@authorfirst{#1}
  \gdef\@authorlast{#2}
}
% Endereco do Autor (utilizado no verso da folha de rosto
\renewcommand{\itaauthoraddress}[3]{%
  \gdef\@itaauthoraddress{#1}
  \gdef\@itaauthorcep{#2}
  \gdef\@itaauthorcity{#3}
}
% Orientador...
\newcommand{\advisor}[3][\itaadvisorwordbabel]{     % [word] ,title, name
  \renewcommand{\itaadvisorname}{#3}
  \renewcommand{\itaadvisortitle}{#2}
  \renewcommand{\itaadvisorword}{#1}
  \gdef\@advisor{#2~#3 \\ #1}
  \gdef\itaadvisorwordbabelll{#1}
}
% Co-orientador...  (opcional)
\newcommand{\coadvisor}[4][\itacoadvisorwordbabel]{%
  \gdef\@itacoadvisorname{#3}
  \gdef\@itacoadvisortitle{#2}
  \gdef\@itacoadvisorinst{#4}
  \gdef\@coadvisor{#2~#3 \\ #1}
  \gdef\itacoadvisorwordbabelll{#1}
}
% Chefe da Divisao de Pos-Graduacao...
\newcommand{\boss}[3][\itabosswordbabel]{      %[word] ,title, name
  \renewcommand{\itabossname}{#3}
  \renewcommand{\itabosstitle}{#2}
  \renewcommand{\itabossword}{#1}
  \gdef\@boss {#2~#3 \\ #1}
}
% Curso de Pos-Graduacao...
\newcommand{\course}[1]{
  \renewcommand{\itaworkcourse}{#1}
}
% Divisao...
\newcommand{\dept}[1]{
  \renewcommand{\itaworkdept}{#1}
}
% Area do Curso...
\newcommand{\area}[1]{
  \renewcommand{\itaworkarea}{#1}
}

%==============================================================================
%%% Hack: Pagina de Rosto para Teses
%==============================================================================
\newcommand{\itatitletext}{\itatitletextbabel}

\renewcommand{\maketitle}{%
   \begin{titlepage}
      \pdfbookmark[0]{\nametitlepage}{titulo}
      % verifica se eh uma tese ou um exame de qualificacao
      \ifthenelse{\equal{\itaoptionlevel}{quali}}
              {\thequalititlepage }
              {\thethesistitlepage }
   \end{titlepage}

   \ifthenelse{\equal{\itaoptionlevel}{quali}}
              {\setcounter{page}{2}}
              {\setcounter{page}{4}}
}

%==============================================================================
% Capa do Exame de Qualificacao para Doutorado
%==============================================================================
\newcommand{\thequalititlepage}{%

   \noindent
   \center
   \begin{spacing}{1.5}
      {\Large \itanametitlequalibabel } \\        %  ITA -- \textsc{Instituto Tecnol�gico de Aeron�utica}} \\
      {\Large \itaposnametitlequalibabel } \\     %  \textsc{P�s-Gradua��o em \itaworkcourse}} \\
      {\large \itaarenametitlequalibabel }        %  \textsc{�rea de \itaworkarea}}
    \end{spacing}

    \vfill

   \begin{spacing}{1.2}
   \itaformatworktitle{\MakeUppercase{\@title}}
   \end{spacing}

   \vfill

   por\\
   \itaformatauthorname{\@authorfirst\ \@authorlast}

   \vfill

   \normalsize
   \hspace{\fill}
   \parbox[b]{8.5cm}{\itaqualifictext}%

   \vfill

   \begin{spacing}{1.5}
       \@advisor
   \end{spacing}

   \@ifundefined{@coadvisor}{}{      % Co-advisor eh opcional
        \vfill
        \@coadvisor
   }

   \vfill

   \begin{spacing}{1.5}
   S\~{a}o Jos\'{e} dos Campos, \@publmonth\ de \@publyear
   \end{spacing}
 }

%==============================================================================
% Capa das Teses de Mestrado e Doutorado
%==============================================================================
\newcommand{\thethesistitlepage}{%

   \noindent

   \begin{spacing}{1.2}
   \noindent \parbox[c]{\textwidth}{\itaformattitletext{\itatitletext}}
   \end{spacing}

   \vspace*{\stretch{2}}

   \center

   \itaformatauthorname{\@authorfirst\ \@authorlast}
   \vfill

   \vspace*{\stretch{1}}

   \begin{spacing}{1.2}
   \itaformatworktitle{\MakeUppercase{\@title}}
   \end{spacing}

   \vspace*{\stretch{2}}

   \normalsize
   \itathesisapprovedmembersbabel

   \vspace*{\stretch{3}}

   \begin{spacing}{1.5}
       \@advisor
   \end{spacing}

%    \@ifundefined{@coadvisor}{}{      % Co-advisor eh opcional
%         \vspace*{\stretch{2}}
%         \@coadvisor
%   }

   \@ifundefined{@coadvisor}{}{      % Co-advisor eh opcional
        \vspace*{\stretch{2}}
        \begin{spacing}{1.5}
        \@coadvisor
	\end{spacing}
  }



   \vspace*{\stretch{2}}

   \begin{spacing}{1.5}
       \@boss
   \end{spacing}

   \vspace*{\stretch{2}}

   \begin{spacing}{1.5}
   Campo Montenegro \\ S\~{a}o Jos\'{e} dos Campos, SP - \itacountrybabel \\ \@publyear
   \end{spacing}

   \@makecippage        % funcao para criar verso da folha de rosto
   \@listexaminators    % funcao para criar pagina de membros da banca
 }

%==============================================================================
% CIP ... Verso da Folha de Rosto
%==============================================================================
\newcommand{\@makecippage}{%
	\newpage%
  \pdfbookmark[0]{\namecip}{cip}
	\thispagestyle{empty}
	\begin{flushleft}
		\begin{footnotesize}
 		{\setlength{\baselineskip}{0.8\baselineskip}
		  \textbf{\itaciptitlebabel} \\
		  \textbf{\itacipbibbabel}\\}
		\end{footnotesize}
		\@cipwindow
		\@bibref
		\@rights
        \end{flushleft}
        \vfill

}
% defini��o do quadro
\def\@cipwindow{%
        \framebox[\textwidth]{%
        \begin{minipage}{\textwidth - 10mm}%
	   \begin{flushleft}
	   	\vspace*{0.4ex}
                \setlength{\parindent}{0.5em}%
		\begin{footnotesize}
 		    \setlength{\baselineskip}{0.7\baselineskip}
		    \noindent\@authorlast, \@authorfirst\par
                    \@title\ / \@authorfirst\ \@authorlast.\\
                    \noindent S�o Jos� dos Campos, \@publyear.\par
                    \NumPenultimaPagina f.\par
		    \vspace{\baselineskip}
		    \itacipdata1babel
                    \vspace{0.4ex}
                   \end{footnotesize}
	   \end{flushleft}
        \end{minipage}%
        }%
}

% Referencia Bibliografica
\def\@bibref{%
       \vspace*{\stretch{2}}
       \normalsize
          \textbf{\itarefbibnamecipbabel} \par

          {\setlength{\baselineskip}{0.7\baselineskip}
          \MakeUppercase{\@authorlast}, \@authorfirst. \textbf{\@title}. \@publyear.                     \NumPenultimaPagina f. \itacip2babel \\}
}
% Cessao de Direitos
\def\@rights{%
       \vspace*{\stretch{4}}
       {\normalsize\textbf{\itacedirnamebabel}} \par
       {\setlength{\baselineskip}{0.7\baselineskip}
       {\footnotesize \itacipauthorname} {\normalsize \@authorfirst\ \@authorlast} \\
       {\footnotesize \itacipworktitlebabel} {\normalsize \@title.} \\
       {\footnotesize \itacipworktype} {\normalsize \itaworklevel\ / \@publyear} \\ }

       \vspace{\baselineskip}

       \parbox[c]{\textwidth}{\normalsize\setlength{\baselineskip}{0.7\baselineskip}\itacesdirtextbabel \\}

       \vspace*{\stretch{2}}
       \rule{75mm}{0.2mm}\\
       {\normalsize\setlength{\baselineskip}{0.7\baselineskip}
           \@authorfirst\ \@authorlast\\
	   \@itaauthoraddress\\
	   CEP \@itaauthorcep\ -- \@itaauthorcity\\}
}

%==============================================================================
%%% Banca Examinadora...
%==============================================================================
\newcommand{\@listexaminators}
{
   \newpage
   \pdfbookmark[0]{\namepageexaminersbookmark}{aprovacao}
   \thispagestyle{empty}

   \noindent
   \begin{spacing}{1.2}
       \begin{center}
         \itaformatworktitle{\MakeUppercase{\@title}}
         \vfill
         \itaformatauthorname{\@authorfirst\ \@authorlast}
         \vfill
       \end{center}
       \raggedright{\normalsize{\namepageexaminers}}
       \vfill
    \end{spacing}
        \raggedright\@memberslist
     \vfill
     \center
         \large\textbf{ITA}

}

%==============================================================================
%%% Dedicat�ria...
%==============================================================================
\newenvironment{itadedication}
{\thispagestyle{empty}%
  \pdfbookmark[0]{\namededicatory}{dedication}
  \begin{flushright}%
  \null\vfil \@beginparpenalty\@lowpenalty
  \vspace{120mm}
  \hspace{80mm}
  \begin{minipage}[b]{0.35\textwidth}\begin{spacing}{1.5}}
{\end{spacing}\end{minipage}\end{flushright}\par\vfil\null\newpage}

%==============================================================================
%%% Agradecimentos...
%==============================================================================
\newenvironment{itathanks}[1][\nameacknowledgment]
{
 \chapter*{#1}
 \pdfbookmark[0]{\nameacknowledgment}{acknowledgment}
 \begin{flushright}\begin{spacing}{1.5}}
 {\end{spacing}\end{flushright} \par\vfil\null\newpage}

%==============================================================================
%%% Resumo ...
%==============================================================================
\newenvironment{abstract}
{\chapter*{\nameabstract}
 \pdfbookmark[0]{\nameabstract}{resumo}
 \begin{spacing}{2}}
{\end{spacing} }

%==============================================================================
%%% Abstract ...
%==============================================================================
\newenvironment{englishabstract}
{\chapter*{\nameengabstract}
 \pdfbookmark[0]{\nameengabstract}{abstract}
 \it \begin{spacing}{2}} %abstract em italico ativado
{ \end{spacing} }

%==============================================================================
%%% Redefinicao de chapter
%==============================================================================
\renewcommand\chapter{\if@openright\cleardoublepage\else\clearpage\fi
                    \thispagestyle{empty}%
                    \global\@topnum\z@
                    \@afterindenttrue
                    \secdef\@chapter\@schapter}
% Redefinicao do espaco entre paragrafos
\setlength{\parskip}{.5em}

%==============================================================================
%%% Hack: Adicionando Bibliografia, Lista de Figuras, Lista de Tabelas,
%%% Lista de Simbolos e Lista de Abreviaturas ao Sumario
%==============================================================================
% Bibliografia
\renewenvironment{thebibliography}[1]
     {\chapter*{\bibname
      \refstepcounter{chapter}
      \addcontentsline{toc}{chapter}{\bibname}   % Thanks to D.Farfan
      \@mkboth{\MakeUppercase{\bibname}}%
              {\MakeUppercase{\bibname}}}%       % Thanks to ffs :-)
      \list{\@biblabel{\@arabic\c@enumiv}}%
           {\settowidth\labelwidth{\@biblabel{#1}}%
            \leftmargin\labelwidth
            \advance\leftmargin\labelsep
            \@openbib@code
            \usecounter{enumiv}%
            \let\p@enumiv\@empty
            \renewcommand\theenumiv{\@arabic\c@enumiv}}%
      \sloppy
      \clubpenalty4000
      \@clubpenalty \clubpenalty
      \widowpenalty4000%
      \sfcode`\.\@m
}
     {\def\@noitemerr
       {\@latex@warning{Empty `thebibliography' environment}}%
      \endlist}

% Lista de figuras...
\renewcommand\listoffigures{%
    \begin{spacing}{1.5}   %ita
    \if@twocolumn
      \@restonecoltrue\onecolumn
    \else
      \@restonecolfalse
    \fi
    \chapter*{\listfigurename
      \@mkboth{\MakeUppercase{\listfigurename}}%
              {\MakeUppercase{\listfigurename}}}      % Thanks to Reinaldo Fortes
    \addcontentsline{toc}{chapter}{\listfigurename}   % Thanks to D.Farfan
    \@starttoc{lof}%
    \if@restonecol\twocolumn\fi
    \end{spacing}   %ita
    }

% Lista de tabelas...
\renewcommand\listoftables{%
    \begin{spacing}{1.5}   %ita
    \if@twocolumn
      \@restonecoltrue\onecolumn
    \else
      \@restonecolfalse
    \fi
    \chapter*{\listtablename
      \@mkboth{\MakeUppercase{\listtablename}}%
               {\MakeUppercase{\listtablename}}}     % Thanks to Reinaldo Fortes
    \addcontentsline{toc}{chapter}{\listtablename}   % Thanks do D.Farfan
    \@starttoc{lot}%
    \if@restonecol\twocolumn\fi
    \end{spacing}   %ita
    }

% Redefinicao do Sum�rio...
\renewcommand\tableofcontents{%
    \begin{spacing}{1.5}   %ita
    \if@twocolumn
      \@restonecoltrue\onecolumn
    \else
      \@restonecolfalse
    \fi
    \chapter*{\contentsname
        \pdfbookmark[0]{\namecontents}{contents}
        \@mkboth{\MakeUppercase{\contentsname}}%
                 {\MakeUppercase{\contentsname}}}       % Thanks to Reinaldo Fortes
     \@starttoc{toc}%
    \if@restonecol\twocolumn\fi
    \end{spacing}   %ita
    }

% Lista de S�mbolos...
\newcommand\listofsymbols{%
    \begin{spacing}{1.5}   %ita
    \if@twocolumn
      \@restonecoltrue\onecolumn
    \else
      \@restonecolfalse
    \fi
    \chapter*{\listofsymbolsname
      \@mkboth{\MakeUppercase{\listofsymbolsname}}%
              {\MakeUppercase{\listofsymbolsname}}}%         Thanks to Reinaldo Fortes
    \addcontentsline{toc}{chapter}{\listofsymbolsname}%      Thanks to ffs  :-)
    \@starttoc{lof}%
    \if@restonecol\twocolumn\fi
    \end{spacing}   %ita
    }

% Lista de Abreviaturas...
\newcommand\listofabbreviations{%
    \begin{spacing}{1.5}   %ita
    \if@twocolumn
      \@restonecoltrue\onecolumn
    \else
      \@restonecolfalse
    \fi
    \chapter*{{\listofabbreviationsname}
      \@mkboth{\MakeUppercase{\listofabbreviationsname}}%       Thanks to Reinaldo Fortes
              {\MakeUppercase{\listofabbreviationsname}}}%
     \addcontentsline{toc}{chapter}{\listofabbreviationsname}%  Thanks to ffs  :-)
    \@starttoc{lof}%
    \if@restonecol\twocolumn\fi
    \end{spacing}   %ita
    }


% Thanks to Dr. Alan Wilter Sousa da Silva - alan@lncc.br
\renewcommand{\addcontentsline}[3]{%
  \begingroup
    \let\label\@gobble
    \let\textlatin\@firstofone
    \ifx\@currentHref\@empty
      \Hy@Warning{%
        No destination for bookmark of \string\addcontentsline,%
        \MessageBreak destination is added%
      }%
      \phantomsection
    \fi
    \expandafter\ifx\csname toclevel@#2\endcsname\relax
      \begingroup
        \def\Hy@tempa{#1}%
        \ifx\Hy@tempa\Hy@bookmarkstype
          \Hy@WarningNoLine{bookmark level for unknown #2 defaults to 0}%
        \else
          \Hy@Info{bookmark level for unknown #2 defaults to 0}%
        \fi
      \endgroup
      \expandafter\gdef\csname toclevel@#2\endcsname{0}%
    \fi
    \edef\Hy@toclevel{\csname toclevel@#2\endcsname}%
    \Hy@writebookmark{\csname the#2\endcsname}%
      {#3}%
      {\@currentHref}%
      {\Hy@toclevel}%
      {#1}%
    \ifHy@verbose
      \typeout{pdftex: bookmark at \the\inputlineno:
        {\csname the#2\endcsname}
        {#3}
        {\@currentHref}%
        {\Hy@toclevel}%
        {#1}%
      }%
    \fi
    \addtocontents{#1}{%
      \protect\contentsline{#2}{#3}{\thepage}{\@currentHref}%
    }%
  \endgroup
}

%==============================================================================
%%% Cabecalhos e Rodap�s
%==============================================================================
\pagestyle{fancy}
\lhead{\leftmark}
\chead{}
\rhead{\thepage}
\lfoot{}\cfoot{}\rfoot{}
\renewcommand{\headrulewidth}{0.5pt}
\renewcommand{\footrulewidth}{0pt}
% Imprimir rodape com versao preliminar?
  \if@dv
     \rfoot{\emph{\itadvnamebabel\ \today }}
  \fi

%==============================================================================
%%% Membros da banca examinadora
%==============================================================================
\newcounter{mecounter}
\newcommand{\examiner}[4]{
        \addtocounter{mecounter}{1}
        \expandafter\gdef\csname metitle\alph{mecounter}\endcsname{#1}
        \expandafter\gdef\csname mename\alph{mecounter}\endcsname{#2}
        \expandafter\gdef\csname merole\alph{mecounter}\endcsname{#3}
        \expandafter\gdef\csname meinst\alph{mecounter}\endcsname{#4}
}

\newcommand{\@memberslist}{%
   \begin{tabular}{l l l l}
      \@ifundefined{metitlea}{}    {\metitlea\@         & \menamea\@       & \hspace{1cm} \merolea\@ & - \hspace{0.5cm} \meinsta\@ } \\
                                 \itaadvisortitle   & \itaadvisorname  & \hspace{1cm} \itaadvisorwordbabelll\ & - \hspace{0.5cm} ITA       

      \@ifundefined{@coadvisor}{}  {\\ \@itacoadvisortitle   & \@itacoadvisorname  & \hspace{1cm} \itacoadvisorwordbabelll & - \hspace{0.5cm} \@itacoadvisorinst }
      \@ifundefined{metitleb}{}    {\\ \metitleb\@ & \menameb\@ & \hspace{1cm} \meroleb\@ & - \hspace{0.5cm} \meinstb\@ } \\
      \@ifundefined{metitlec}{}    {\metitlec\@ & \menamec\@ & \hspace{1cm} \merolec\@ & - \hspace{0.5cm} \meinstc\@ } \\
      \@ifundefined{metitled}{}    {\metitled\@ & \menamed\@ & \hspace{1cm} \meroled\@ & - \hspace{0.5cm} \meinstd\@ } \\
      \@ifundefined{metitlee}{}    {\metitlee\@ & \menamee\@ & \hspace{1cm} \merolee\@ & - \hspace{0.5cm} \meinste\@ } \\
      \@ifundefined{metitlef}{}    {\metitlef\@ & \menamef\@ & \hspace{1cm} \merolef\@ & - \hspace{0.5cm} \meinstf\@ } \\
      \@ifundefined{metitleg}{}    {\metitleg\@ & \menameg\@ & \hspace{1cm} \meroleg\@ & - \hspace{0.5cm} \meinstg\@ } \\
      \@ifundefined{metitleh}{}    {\metitleh\@ & \menameh\@ & \hspace{1cm} \meroleh\@ & - \hspace{0.5cm} \meinsth\@ }
        \end{tabular}
}

%==============================================================================
%%% Palavras-chave
%==============================================================================
\newcommand{\keywords}[1]{%
    \vfill \noindent\textbf{Palavras--Chave:} #1%
}

%==============================================================================
%%% Keywords
%==============================================================================
\newcommand{\englishkeywords}[1]{%
    \vfill \noindent\textbf{Keywords:} #1
}

%==============================================================================
% Defini��o das palavras-chave para CIP (informado pela Biblioteca)
%==============================================================================
\newcounter{kwcipcounter}
\newcommand{\kwcip}[1]{
        \addtocounter{kwcipcounter}{1}
        \expandafter\gdef\csname kwcip\alph{kwcipcounter}\endcsname{#1}
}
\newcommand{\@cipkw}{%
        \@ifundefined{kwcipa}{}{1.~\expandafter\MakeUppercase\kwcipa\@. }%
        \@ifundefined{kwcipb}{}{2.~\expandafter\MakeUppercase\kwcipb\@. }%
        \@ifundefined{kwcipc}{}{3.~\expandafter\MakeUppercase\kwcipc\@. }%
        \@ifundefined{kwcipd}{}{4.~\expandafter\MakeUppercase\kwcipd\@. }%
        \@ifundefined{kwcipe}{}{5.~\expandafter\MakeUppercase\kwcipe\@. }%
        \@ifundefined{kwcipf}{}{6.~\expandafter\MakeUppercase\kwcipf\@. }%
        \@ifundefined{kwcipg}{}{7.~\expandafter\MakeUppercase\kwcipg\@. }%
        \@ifundefined{kwciph}{}{8.~\expandafter\MakeUppercase\kwciph\@. }%
        \@ifundefined{kwcipi}{}{9.~\expandafter\MakeUppercase\kwcipi\@. }%
        \@ifundefined{kwcipj}{}{10.~\expandafter\MakeUppercase\kwcipj\@. }%
}

%==============================================================================
%%% Hack: Centralizando \chapter*
%%% \@makeschapterhead � chamado por \chapter*
%==============================================================================
\def\@makeschapterhead#1{%
  \vspace*{50\p@}%
  {\parindent \z@ \centering
    \normalfont
    \interlinepenalty\@M
    \Huge \bfseries  #1\par\nobreak
    \vskip 40\p@
  }}

%==============================================================================
%%% Redefinicao do comando \appendix para mostrar 'Ap�ndice' ou 'Anexo'
%%% no Sumario
%==============================================================================
\renewcommand{\appendix}{%
  \cleardoublepage
  \providecommand\anexoautorefname{appendix}
	\setcounter{chapter}{0}%
	\setcounter{section}{0}%
	\def\Hy@appendixstring{appendix}% %%novo string no *.toc, para fazer o hyperlink funcionar
	\def\anexo{%
  \@ifundefined{chapter}%
    {\gdef\theHsection{\Alph{section}}}%
    {\gdef\theHchapter{\Alph{chapter}}}%
  \xdef\Hy@chapapp{\Hy@appendixstring}%

  \gdef\@chapapp{\appendixname}%
  \addtocontents{toc}{\SetAppendixTocName{\appendixname}}%
  \gdef\thechapter{\@Alph\c@chapter}%
  }
  \anexo
}

%==============================================================================
%%% Acrescenta o comando SetappendixTocName ao toc
%==============================================================================
\DeclareRobustCommand{\SetAppendixTocName}[1]{\gdef\AppendixTocName{#1}}

%==============================================================================
%%% Novo comando: \annex
%==============================================================================
\newcommand{\annex}{%
  \cleardoublepage
  \providecommand\anexoautorefname{annex}
	\setcounter{chapter}{0}%
	\setcounter{section}{0}%
	\def\Hy@appendixstring{annex}% %%novo string no *.toc, para fazer o hyperlink funcionar
	\def\anexo{%
  \@ifundefined{chapter}%
    {\gdef\theHsection{\alph{section}}}%
    {\gdef\theHchapter{\alph{chapter}}}%
  \xdef\Hy@chapapp{\Hy@appendixstring}%

  \gdef\@chapapp{\nameannex}%
  \addtocontents{toc}{\SetAppendixTocName{\nameannex}}%
  \gdef\thechapter{\@Alph\c@chapter}%
  }
  \anexo
}


%==============================================================================
%%% Redefinicao de mainmatter para numeracao continua de paginas
%==============================================================================
\renewcommand\mainmatter{%
  \cleardoublepage
  \@mainmattertrue
  \renewcommand{\thepage}{\arabic{page}} }

%==============================================================================
%%% 'Desligar' hifenacao...
%==============================================================================
\newlanguage\nohyphen
\newcommand\nh[1]{{\language\nohyphen #1}}

%==============================================================================
%%% Redefinicao de l@chapter, l@section e l@subsection para acrescentar
%%% a palavra 'Anexo' ou 'Apendice' no toc e ajustar identacao para
%%% "nada identado" ... :-)
%==============================================================================
\renewcommand*\l@chapter[2]{%
  \ifnum \c@tocdepth >\m@ne
    \addpenalty{-\@highpenalty}%
    \vskip -3ex \@plus\p@
    \setlength\@tempdima{1.5em}%
    \begingroup
    \ifx\AppendixTocName\undefined\else
       \renewcommand{\numberline}[1]{\AppendixTocName~##1~~--~~}%
    \fi
      \parindent \z@ \rightskip \@pnumwidth
      \parfillskip -\@pnumwidth
      \leavevmode \bfseries
      \advance\leftskip\@tempdima
      \hskip -\leftskip
      \@dottedtocline{0}{0em}{1.8em}{\normalfont\scshape\large{#1}}{#2}
      \penalty\@highpenalty
    \endgroup
  \fi}

% l@section
\renewcommand*{\l@section}[2]{%
\@dottedtocline{1}{0em}{2.8em}{\textbf{#1}}{\hss #2}}

% l@subsection
\renewcommand*{\l@subsection}{\@dottedtocline{2}{0em}{3.7em}}

%==============================================================================
%%% Numerar o subsubsection conforme definido anteriormente
%==============================================================================
\setcounter{secnumdepth}{4}

%==============================================================================
%%% Glossario
%==============================================================================
\newcommand{\itaglossary}{
\cleardoublepage
\thispagestyle{empty}%
\@mkboth{\MakeUppercase{\itaglossarynamebabel}}%
        {\MakeUppercase{\itaglossarynamebabel}}%
\gdef\glossaryname{\itaglossarynamebabel}
\refstepcounter{chapter}
}

%==============================================================================
% %%% Centralizar e ajustar os espacamentos dos captions das figuras e tabelas 
%==============================================================================
\def\fnum@figure{\centering\MakeUppercase{\figurename}\nobreakspace\thefigure}
\def\fnum@table{\centering\MakeUppercase{\tablename}\nobreakspace\thetable}
\setlength\abovecaptionskip{6\p@}
\setlength\belowcaptionskip{4\p@}

% Redefinicao do caracter que separa o label Figura ou Tabela do texto
\renewcommand*\captionlabeldelim{\ --}

%==============================================================================
% %%% Indentar a segunda linha de captions longos das listas 
%     de figuras e tabelas
%==============================================================================
\renewcommand*{\l@figure}{\@dottedtocline{1}{0cm}{1cm}}
\def\FigureITA@dottedtocline#1#2#3#4#5{\begingroup
  \def\numberline##1{\hb@xt@\@tempdima{\itafigurenamebabel~##1 --\hfil}}%
  \@dottedtocline{#1}{#2}{#3}{#4}{#5}%
\endgroup}
\def\TableITA@dottedtocline#1#2#3#4#5{\begingroup
  \def\numberline##1{\hb@xt@\@tempdima{\itatablenamebabel~##1 --\hfil}}%
  \@dottedtocline{#1}{#2}{#3}{#4}{#5}%
\endgroup}
% faz a lista de figuras e de tabelas usarem as novas versoes dos \dottedtocline
\renewcommand*\l@figure{\FigureITA@dottedtocline{1}{0cm}{2.8cm}}
\renewcommand*\l@table{\TableITA@dottedtocline{1}{0cm}{2.8cm}}


%==============================================================================
% Folha de Registro do Documento
%==============================================================================
\newcommand{\esp}{.2cm}

% Definicoes dos valores dos campos do formulario
\newcommand{\FRDitadata}[1]{\gdef\FRDitadatababel{#1}}
\newcommand{\FRDitadocnro}[1]{\gdef\FRDitadocnrobabel{#1}}
\newcommand{\FRDitaorgaointerno}[1]{\gdef\FRDitaorgaointernobabel{#1}}
\newcommand{\FRDitapalavrasautor}[1]{\gdef\FRDitapalavrasautorbabel{#1}}
\newcommand{\FRDitapalavrasresult}[1]{\gdef\FRDitapalavrasresultbabel{#1}}

\newcommand{\FRDitaresumo}[1]{
    \gdef\FDRitaabstractcontent{#1}
}


%  Opcoes para: 
%  Nacional ou Internacional -- N/I
%  Ostensivo, Reservado, Confidencial ou Secreto -- O/R/C/S
\newcommand{\FRDitaOpcoes}[2]{
      \gdef\N{\ } \gdef\I{\ }      
      \gdef\O{\ } \gdef\R{\ } \gdef\C{\ } \gdef\S{\ }      
      
      \ifthenelse{\equal{#1}{N}}{\gdef\N{\textbf{X}}}{}
      \ifthenelse{\equal{#1}{I}}{\gdef\I{\textbf{X}}}{}
      
      \ifthenelse{\equal{#2}{O}}{\gdef\O{\textbf{X}}}{}
      \ifthenelse{\equal{#2}{R}}{\gdef\R{\textbf{X}}}{}
      \ifthenelse{\equal{#2}{C}}{\gdef\C{\textbf{X}}}{}
      \ifthenelse{\equal{#2}{S}}{\gdef\S{\textbf{X}}}{}
}

% Folha de Registro de Documento
\newcommand{\itaFRD}{
     
     \if@openright\cleardoublepage\else\clearpage\fi
     
     %Redefinicao das margens ...
	\setlength{\hoffset}{-1in}        % remove padr�o do LaTeX
	\setlength{\voffset}{-1in}        % remove padr�o do LaTeX
	\setlength{\oddsidemargin}{1cm}   % margem esquerda, p�ginas �mpares
	\setlength{\evensidemargin}{1cm}  % margem esquerda, p�ginas pares
	\setlength{\topmargin}{3cm}       % margem superior
	\newlength{\bottommargin}         % margem inferior � deduzida em LaTeX
	\setlength{\bottommargin}{2cm}    % margem inferior
	\setlength{\headheight}{0pt}      % altura do cabe�alho
	\setlength{\headsep}{0pt}         % espa�o entre cabe�alho e texto
	\setlength{\footskip}{0mm}        % espa�o entre rodap� e texto
	\setlength\textheight{            % altura dispon�vel para texto
		\paperheight-\topmargin-\bottommargin-\headheight-\headsep-\footskip
	}
	% margem direita � deduzida em LaTeX... alterando isso...
	\newlength{\rightmarginn}        
	\setlength{\rightmarginn}{2cm}    % margem direita

	\setlength\textwidth{             % largura dispon�vel para texto
		\paperwidth-\oddsidemargin-\rightmarginn
	}

     \singlespacing
     \footnotesize
     \setlength{\baselineskip}{0.1\baselineskip}
     \setlength{\parskip}{.1em}
     \setlength{\extrarowheight}{2pt}
          
     \lhead{}\rhead{}

     \thispagestyle{empty}
     \pdfbookmark[0]{\itapagedocregbabel}{bla}    
     
     \begin{tabularx}{\textwidth}{|X|X|X|X|}
	\hline
	\multicolumn{ 4}{|c|}{} \\
	\multicolumn{ 4}{|c|}{\normalsize FOLHA DE REGISTRO DO DOCUMENTO} \\
	\multicolumn{ 4}{|c|}{} \\
	\hline
	
	$^{1.}$ \scriptsize CLASSIFICA��O/TIPO & 
	$^{2.}$ \scriptsize DATA               & 
	$^{3.}$ \scriptsize DOCUMENTO N�       & 
	$^{4.}$ \scriptsize N� DE P�GINAS             \tabularnewline 
	
	\centering{\ifthenelse{\equal{\itaoptionlevel}{msc}}{TM}{TD}}  & 
	\centering{\FRDitadatababel}   & 
	\centering\scriptsize \FRDitadocnrobabel  &  
	\centering\NumPenultimaPagina                  \tabularnewline[\esp]
	\hline
	
	\multicolumn{ 4}{|p{17cm}|}{$^{5.}$ \scriptsize T�TULO E SUBT�TULO:} \\
	\multicolumn{ 4}{|l|}{\nh{\parbox[b]{.95\textwidth}{\@title}}} \\[\esp]
	\hline
	\multicolumn{ 4}{|l|}{$^{6.}$ \scriptsize AUTOR(ES):} \\
	\multicolumn{ 4}{|l|}{\textbf{\@authorfirst\ \@authorlast}} \\[\esp]
	\hline
	\multicolumn{ 4}{|l|}{$^{7.}$ \scriptsize INSTITUI��O(�ES)/�RG�O(S) 
	    INTERNO(S)/DIVIS�O(�ES):} \\
	\multicolumn{ 4}{|l|}{Instituto Tecnol�gico de Aeron�utica. \FRDitaorgaointernobabel} \\[\esp]
	\hline
	\multicolumn{ 4}{|l|}{$^{8.}$ \scriptsize PALAVRAS-CHAVE SUGERIDAS PELO AUTOR:} \\
	\multicolumn{ 4}{|p{17cm}|}{\FRDitapalavrasautorbabel} \\[\esp]
	\hline
	\multicolumn{ 4}{|l|}{$^{9.}$ \scriptsize PALAVRAS-CHAVE RESULTANTES DE INDEXA��O:} \\
	\multicolumn{ 4}{|p{17cm}|}{\FRDitapalavrasresultbabel} \\[\esp]
	\hline
	\multicolumn{ 4}{|l|}{$^{10.}$ {\scriptsize APRESENTA��O:}  \hfill 
		(\N) \textbf{Nacional} \ \ \ 
		(\I) \textbf{Internacional} } \\
	\multicolumn{ 4}{|l|}{ITA, S�o Jos� dos Campos, \@publyear, \NumPenultimaPagina\ p�ginas} \\[\esp]
	\hline
	\multicolumn{ 4}{|l|}{$^{11.}$ \scriptsize RESUMO:} \\
	\multicolumn{ 4}{|c|}{\parbox[t][12cm]{.95\textwidth}{\FDRitaabstractcontent}} \\[\esp]
	\hline
	\multicolumn{ 4}{|l|}{$^{12.}$ \scriptsize GRAU DE SIGILO:} \\
	\multicolumn{ 4}{| l|}{(\O) \textbf{OSTENSIVO} \hfill 
			       (\R) \textbf{RESERVADO} \hfill 
			       (\C) \textbf{CONFIDENCIAL} \hfill 
			       (\S) \textbf{SECRETO}} \\[\esp]
	\hline
     \end{tabularx}  
     
}


%==============================================================================
%%% Hack: Retirando a palavra Capitulo mas mantendo Anexo e Apendice...
%%% \@makechapterhead � chamado por \chapter
%==============================================================================
\def\@makechapterhead#1{%
  \vspace*{50\p@}%
  {\parindent \z@ \raggedright \normalfont
    \ifnum \c@secnumdepth >\m@ne
      \if@mainmatter
          % se "anexo" nao foi definido, altera cabecalho do capitulo..
	  % senao, mantem a palavra Anexo ou Apendice
          \@ifundefined{anexo}      
		{\huge\bfseries \thechapter\space}
		{\huge\bfseries \@chapapp\space \thechapter \space -}
      \fi
    \fi
    \interlinepenalty\@M
    \Huge \bfseries #1\par\nobreak
    \vskip 40\p@
  }}
  
  
%==============================================================================
%%% Obtendo o numero da penultima pagina, visto que a FRD nao � contada ...
%%% Thanks to Dr. Miguel V. S. Frasson!! :-)
%==============================================================================
\def\deixasosegundo#1#2#3!{#2}
\makeatletter
\AtBeginDocument{%
  % se a referencia a ultima pagina nao existe, definir como ??
  \expandafter\ifx\csname r@LastPage\endcsname\relax
    \newcommand\NumPenultimaPagina{{\bfseries??}}%
  \else
    \newcounter{butlastpage}%
    \setcounter{butlastpage}{\expandafter\deixasosegundo\r@LastPage!}%
    \addtocounter{butlastpage}{-1}%
    \newcommand\NumPenultimaPagina{}%
    \edef\NumPenultimaPagina{\arabic{butlastpage}}%
  \fi}
  
  