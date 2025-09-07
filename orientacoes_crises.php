<?php
session_start();
$page_title = "Orientações em Momentos de Crises";
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
        <p>Depoimentos e orientações de pessoas autistas sobre como lidar com momentos de crise.</p>
        <img src="crise.jpeg" alt="Ilustração sobre momentos de crise" class="img-fluid rounded shadow mx-auto d-block" style="max-width: 1000px;">
    </div>

    <div class="content mt-4">
        <h2>O que é uma crise autista?</h2>
        <p>Crises autistas podem ocorrer devido à sobrecarga sensorial, emocional ou mental. Cada pessoa pode vivenciar crises de formas diferentes, incluindo <strong>meltdowns</strong> (explosões intensas de estresse ou frustração) ou <strong>shutdowns</strong> (respostas de retraimento e bloqueio).</p>
        <p>Essas crises não são birras ou falta de controle, mas sim reações legítimas a um ambiente ou situação que se tornou insustentável para o cérebro autista. Respeito, empatia e preparação são fundamentais.</p>
    </div>

    <div class="content mt-4">
        <h2>Depoimentos</h2>

        <div class="mt-4">
            <p>"Quando estou em crise, prefiro ficar em um ambiente silencioso e seguro. Ter um fone de ouvido com músicas calmas me ajuda a me recompor."</p>
            <footer class="blockquote-footer">Anônimo, 22 anos</footer>
        </div>
        
        <div class="mt-4">
            <p>"Minha estratégia é me afastar do excesso de estímulos e usar objetos de conforto, como meu cobertor favorito."</p>
            <footer class="blockquote-footer">Anônimo, 25 anos</footer>
        </div>

        <div class="mt-4">
            <p>"Avisar as pessoas próximas que estou tendo uma crise é importante para que respeitem meu espaço e tempo."</p>
            <footer class="blockquote-footer">Anônimo, 17 anos</footer>
        </div>
    </div>

    <div class="content mt-4">
        <h2>Dicas para lidar com crises</h2>
        <ul>
            <li>Identifique os gatilhos que levam à crise.</li>
            <li>Crie um ambiente seguro e confortável.</li>
            <li>Use estratégias de autorregulação, como respiração profunda ou objetos sensoriais.</li>
            <li>Informe amigos e familiares sobre suas necessidades durante uma crise.</li>
            <li>Permita-se tempo e espaço para se recuperar, sem culpa.</li>
        </ul>
        <p>É essencial lembrar que cada autista tem formas únicas de reagir às crises. Conhecer a si mesmo e criar um plano de apoio individualizado pode ajudar muito a reduzir o impacto dessas situações.</p>
    </div>

    <div class="content mt-4">
        <h2>Referências</h2>
        <ul>
            <li>Revista Autismo – <a href="https://www.revistaautismo.com.br/comportamento/crise-sensorial-e-o-que-fazer/" target="_blank">https://www.revistaautismo.com.br/comportamento/crise-sensorial-e-o-que-fazer/</a></li>
            <li>Autistic Self Advocacy Network (ASAN) – <a href="https://autisticadvocacy.org/" target="_blank">https://autisticadvocacy.org/</a></li>
            <li>National Autistic Society – <a href="https://www.autism.org.uk/advice-and-guidance/topics/behaviour/meltdowns/all-audiences" target="_blank">https://www.autism.org.uk/advice-and-guidance/topics/behaviour/meltdowns/all-audiences</a></li>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>
