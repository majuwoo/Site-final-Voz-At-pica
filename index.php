<?php
session_start();
$page_title = "Bem-vindo ao Voz Atípica";
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
        <h1>Bem-vindo ao Voz Atípica!</h1>
        <p>Somos um grupo de pessoas autistas que busca trazer informações para outras pessoas autistas.</p>
    </div>

    <div class="content mt-4">
        <h2>O que é Autismo?</h2>
        <p>O Transtorno do Espectro Autista (TEA) é uma condição do neurodesenvolvimento que afeta a comunicação, interação social e comportamento. Cada pessoa autista é única, com diferentes forças e desafios.</p>
        <p>O autismo não é uma doença, mas sim uma forma diferente de perceber e interagir com o mundo. Os sinais podem aparecer ainda na infância, geralmente antes dos 3 anos, e incluem dificuldades na comunicação verbal e não verbal, padrões restritos de interesse e comportamentos repetitivos.</p>
        <p>Pessoas autistas podem ter hipersensibilidade ou hipossensibilidade a estímulos sensoriais, como luzes, sons, cheiros ou texturas. Além disso, muitas apresentam habilidades especiais em áreas específicas, como memorização, lógica, arte ou música.</p>
        <p>É importante entender que o TEA é um espectro — ou seja, envolve uma ampla variedade de manifestações e níveis de suporte. O respeito à diversidade neurológica, conhecido como neurodiversidade, é fundamental para promover inclusão e bem-estar para pessoas autistas.</p>
        <p>Embora o diagnóstico clínico seja feito por profissionais da saúde, o reconhecimento e a aceitação por parte da sociedade são igualmente importantes para garantir os direitos e a qualidade de vida das pessoas no espectro.</p>
        <div class="text-center mt-3">
            <img src="pessoas3.jpeg" class="img-fluid rounded" alt="Grupo de pessoas autistas">
        </div>
        <p class="mt-4"><strong>Referências:</strong></p>
        <ul>
            <li>Organização Mundial da Saúde (OMS) – <a href="https://www.who.int/news-room/fact-sheets/detail/autism-spectrum-disorders" target="_blank">https://www.who.int/news-room/fact-sheets/detail/autism-spectrum-disorders</a></li>
            <li>Ministério da Saúde – Brasil – <a href="https://www.gov.br/saude/pt-br/assuntos/noticias/2023/abril/dia-mundial-de-conscientizacao-do-autismo-abraco-azul" target="_blank">https://www.gov.br/saude/pt-br/assuntos/noticias/2023/abril/dia-mundial-de-conscientizacao-do-autismo-abraco-azul</a></li>
            <li>Instituto Nacional de Estudos e Pesquisas Educacionais Anísio Teixeira (INEP) – <a href="https://www.gov.br/inep/pt-br/assuntos/noticias/censo-escolar/2023" target="_blank">https://www.gov.br/inep/pt-br/assuntos/noticias/censo-escolar/2023</a></li>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>
