	<div class="corpo">
		
		<!-- Descrição -->
		<div class="descricao" id="caixa_pesquisa">
			<h2>PESQUISAR</h2>
			<p>Procure uma empresa em qualquer lugar do país</p>
		</div>

		<!-- Formulário de pesquisa -->
		<form name="form_pesquisa" class="formulario-de-pesquisa" method="POST" action="<?php echo BASE_URL; ?>home/resultado#caixa_pesquisa">
			<input id="nome_empresa" type="text" name="nome_empresa" placeholder="Nome da empresa">

			<div class="selects">
				<select id="servico_oferecido" name="servico_oferecido">
					<option>Serviço oferecido</option>
					<option value="Academia">Academia</option>
					<option value="Supermercados & mercearias">Supermercado e mercearia</option>
					<option value="Agricultura">Agricultura</option>
					<option value="Bancas & papelarias">Bancas e papelarias</option>
					<option value="Bancos & lotéricas">Bancos e lotéricas</option>
					<option value="Beleza">Beleza</option>
					<option value="Oficinas mecânicas">Oficinas mecânicas</option>
					<option value="Casa e decoração">Casa e decoração</option>
					<option value="Educação">Educação</option>
					<option value="Floricultura, paisagismo e jardinagem">Floricultura, paisagismo e jardinagem</option>
					<option value="Informática e tecnologia">Informática e tecnologia</option>
					<option value="Loja de carros">Loja de carros</option>
					<option value="Loja de departamentos">Loja de departamentos</option>
					<option value="Loja de roupas e calçados">Loja de roupas e calçados</option>
					<option value="Loja de tecidos e aviamento">Loja de tecidos e aviamento</option>
					<option value="Materiais de construção">Materiais de construção</option>
					<option value="Óticas, relojoarias, joalherias e perfumarias">Óticas, relojoarias, joalherias e perfumarias</option>
					<option value="Saúde e bem-estar">Saúde e bem-estar</option>
					<option value="Outros serviços">Outros serviços</option>
					<option value="Turismo">Turismo</option>
				</select>

				<input type="text" name="bairro" placeholder="Bairro">

				<input type="text" name="cidade" placeholder="Cidade">

				<input type="text" name="estado" placeholder="Estado">

			</div>

			<button type="submit" id="enviar">Pesquisar</button>
		</form>

		<!-- Resultados -->

		<?php
			if($resultados == true):
				foreach($resultados as $dados):

				$dadosCep = new Empresas();
				$dadosCep->cep = $dados['cep'];
				$resultadoCep = $dadosCep->getCep();
		?>

		<div class="resultado">
			<div class="div-menor">
				<img src="<?php echo BASE_URL; ?>users/imgs/<?php echo $dados['foto']; ?>">
			</div>
			<div class="div-maior">
				<p><?php echo mb_strtoupper($dados['nome']); ?> - <?php echo $dados['tipo_servico']; ?></p>

				<div class="contato">
					<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-location-2.svg">
					<a href="https://www.google.com/maps?q=<?php echo $resultadoCep->logradouro; ?>, <?php echo $resultadoCep->bairro; ?>, <?php echo $resultadoCep->localidade; ?>"><?php echo $resultadoCep->logradouro; ?>, <?php echo $resultadoCep->bairro; ?>, <?php echo $resultadoCep->localidade; ?></a>
				</div>
				<div class="contato link-escuro">
					<img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-phone-2.svg">
					<a href="https://api.whatsapp.com/send?phone=<?php echo $dados['whatsapp']; ?>"><?php echo $dados['telefone']; ?></a>
				</div>
				<div class="redes-sociais">
					<p>Redes sociais:</p>
					<a href="https://api.whatsapp.com/send?phone=<?php echo $dados['whatsapp']; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-whatsapp-1"></a>
					<a href="<?php echo $dados['facebook']; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-facebook-5"></a>
					<a href="<?php echo $dados['instagram']; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-instagram-11"></a>
					<a href="<?php echo $dados['site']; ?>"><img src="<?php echo BASE_URL; ?>assets/imgs/iconmonstr-globe-3"></a>
				</div>
			</div>
			<div class="div-menor">
				<div data-email="<?php echo $dados['email']; ?>" class="ler-mais">
					Leia mais >>>
				</div>
			</div>
		</div>

		<?php endforeach; else: ?>

		<!-- Nenhum resultado -->
		<div class="sem-resultados">
			<h2>Nenhuma empresa foi cadastrada ainda</h2>
		</div>

		<?php endif; ?>
		
		<!-- Carregar mais 
		<button class="carregar-mais" id="carregar-mais">Carregar mais</button>
		-->
	</div>