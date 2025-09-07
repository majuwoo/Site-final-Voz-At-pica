<?php
session_start();
$page_title = "Autismo em Mulheres";
include 'header.php';
?>
<style>
body {
    background: linear-gradient(-45deg, #3A1075, #5b2aad, #7b3fcf, #3A1075);
    background-size: 400% 400%;
    animation: gradientBG 15s ease infinite;
    color: white;
    min-height: 100vh;
    margin: 0;
    padding: 0;
}

@keyframes gradientBG {
    0% {background-position: 0% 50%;}
    50% {background-position: 100% 50%;}
    100% {background-position: 0% 50%;}
}

.hero, .content {
    background-color: rgba(58, 16, 117, 0.8);
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 8px 20px rgba(58,16,117,0.3);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    color: white;
    margin-bottom: 30px;
}

.hero:hover, .content:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 25px rgba(58,16,117,0.6);
}

/* Estilo para links */
a {
    color: #d6b3ff;
    text-decoration: none;
    transition: color 0.3s ease;
}

a:hover {
    color: #f3e1ff;
    text-decoration: underline;
}
</style>

<div class="container mt-4">
    <div class="hero">
        <h1><?php echo $page_title; ?></h1>
        <p>Saiba mais sobre as particularidades do autismo em mulheres e os desafios enfrentados no diagnóstico.</p>
    </div>

    <div class="content mt-4">
        <h2>O Autismo e suas diferenças em mulheres</h2>
        <p>O autismo pode se manifestar de forma diferente em mulheres, levando a diagnósticos tardios ou errôneos. Muitas mulheres autistas desenvolvem estratégias para mascarar suas dificuldades — o chamado “camuflagem social” — o que dificulta a identificação da condição, especialmente na infância.</p>
        <p>Essa camuflagem pode incluir imitação de comportamentos sociais, forçar contato visual ou ensaiar interações para parecer “neurotípica”. Embora isso possa ajudar temporariamente na adaptação, muitas vezes resulta em exaustão, ansiedade, depressão e uma sensação constante de inadequação.</p>
        <p>A falta de representação feminina nas pesquisas históricas sobre autismo também contribuiu para a subnotificação de diagnósticos entre meninas e mulheres. Felizmente, esse cenário vem mudando com o avanço dos estudos e o aumento da visibilidade do autismo feminino.</p>
        <div class="text-center mt-3">
            <img src="mulher.jpeg" class="img-fluid rounded" alt="Imagem ilustrativa">
        </div>
        <p class="mt-4"><strong>Referências:</strong></p>
        <ul>
            <li>Revista Autismo – <a href="https://www.revistaautismo.com.br/autismo/autismo-em-mulheres/" target="_blank">https://www.revistaautismo.com.br/autismo/autismo-em-mulheres/</a></li>
            <li>National Autistic Society – Women and Girls – <a href="https://www.autism.org.uk/advice-and-guidance/what-is-autism/women-and-girls" target="_blank">https://www.autism.org.uk/advice-and-guidance/what-is-autism/women-and-girls</a></li>
            <li>Gould, J. & Ashton-Smith, J. (2011). Missed diagnosis or misdiagnosis? – <em>Autism</em> 15(4)</li>
        </ul>
    </div>

    <div class="content mt-4">
        <h2>Especialistas recomendados para o diagnóstico</h2>
        <p>Para um diagnóstico preciso, é importante buscar profissionais qualificados, como:</p>
        <ul>
            <li>Neurologistas</li>
            <li>Psiquiatras</li>
            <li>Psicólogos especializados em neurodesenvolvimento</li>
        </ul>
        <p>Estes especialistas devem estar atentos às sutilezas da apresentação do autismo em mulheres, utilizando instrumentos clínicos adaptados e ouvindo ativamente a experiência da pessoa.</p>
    </div>

    <div class="content mt-4">
        <h2>Desafios enfrentados por mulheres autistas</h2>
        <p>Entre os principais desafios enfrentados por mulheres autistas, estão:</p>
        <ul>
            <li>Expectativas sociais que dificultam a identificação do autismo</li>
            <li>Maior predisposição ao mascaramento social</li>
            <li>Impactos na saúde mental, como ansiedade e depressão</li>
            <li>Dificuldade em obter reconhecimento e validação do diagnóstico</li>
        </ul>
        <p>O acesso ao diagnóstico e suporte adequados pode ser transformador, permitindo que essas mulheres compreendam melhor suas necessidades e fortaleçam sua autoestima e bem-estar emocional.</p>
    </div>
</div>

<?php include 'footer.php'; ?>
