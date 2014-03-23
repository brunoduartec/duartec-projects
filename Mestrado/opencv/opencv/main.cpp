#include <opencv.hpp>

using namespace cv;

int main ( int argc, char **argv )
{
	//nome da imagem
	string filename = "lena.bmp";

	//carrega imagem dentro da estrutura de dados matriz
	Mat img = imread(filename);

	//verifica se a imagem foi carregada corretamente, se não foi, mostre a mensagem de erro e encerre o programa
	if(img.empty())
	{
		fprintf(stderr, "Erro: Imagem %s nao foi encontrada. Verifique se ela se encontra no diretorio do projeto.\n", filename.c_str());
		getchar();
		exit(1);
	}

	//cria uma nova janela
	namedWindow("Topicos Especiais em Processamento de Imagens e Visao Computacional", CV_WINDOW_AUTOSIZE);

	//mostre a imagem na janela que criamos
	imshow("Topicos Especiais em Processamento de Imagens e Visao Computacional", img);

	//espera que o usuário clique em alguma coisa para encerrar o programa;
	waitKey();

	return 0;
}