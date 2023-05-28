====================CONFIGURAÇÕES===========================
	PHP>= 8
	larave == 10.8.0
	postgresSql 4 >= 6.15
===================INSTALAÇÃO===============================
	1. Configure o arquivo .env corretamente, para que a aplicação possa se conectar a base de dados.
	2.Se for a primeira vez que está tentando montar a estrutura das tabelas no banco, utilize o comando "php artisan migrate". Mesmo que o comando anterior tenha sido executado com sucesso e por algum motivo queira montar a 			estrutura novamente, utilize o comando "php artisan migrate:fresh", pois se não o postgres irá acusar sobreposição de tabelas iguais.
	3.Caso queira popular o banco ao mesmo tempo que monta a estrutura das tabelas com alguns dados de surfistas pré-existentes utilize o comando "php artisan migrate --seed", mas so há dados de surfistas nas seeds
	4.Caso queira popuplar o banco após rodar as migration utilize o comando "php artisan db:seed".
	
==================ROUTES====================================
obs: não é necessário o pré fixo "api" na url, pois ja está configurado para ir direto para api, ao invés da rota padrão, exemplo da url recomendada: http://127.0.0.1:8000/surfistas
	/surfistas
		-mostra todos os surfitas cadastrados

	/inserir/surfista
		-Rota para inserir novos surfistas
			{
				"nome": "teste",
				"pais": "Brasil"
			}
	/baterias
		-Rota que Exibe todas as baterias cadastradas


	/criar/bateria
		-Rota para Cadastrar nova bateria
			{
				"surfista1": "teste1",
				"surfista2": "teste2"
			}
	/ondas
		- Rota para ver as ondas cadastradas
			
	
	/cadastrar/onda
		-Rota para criar uma onda
			{
				"bateria": 1, (id de uma bateria existente)
				"surfista2": 1 (id de um surfista existente e cadastrado na bateria escolhida)
			}

	/cadastrar/notas
		- Rota para cadastrar notas de uma onda
			{
				"onda": 1, (id de uma onda existente)
				"notaParcial1": 9,
				"notaParcial2": 7,
				"notaParcial3": 7
			}
		
	/bateria/vencedor
		-Rota para ver quem foi o vencedor da bateria escohida
		{
			"bateria": 1 (id de uma onda existente)
		}

	/notas
		-Rota para caso queira consultar as notas dos surfistas


		
