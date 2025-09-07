<?php
session_start();
$page_title = "Sinais de Autismo";
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
        <p>Entenda os sinais mais comuns do Transtorno do Espectro Autista (TEA) e como identificá-los.</p>
    </div>

    <div class="content mt-4">
        <h2>Sinais Comuns do Autismo</h2>
        <p>O Transtorno do Espectro Autista (TEA) se manifesta de diferentes formas em cada indivíduo, variando em intensidade e combinação de sinais. Alguns sinais comuns incluem:</p>
        <ul>
            <li><strong>Dificuldade na comunicação verbal e não verbal:</strong> Pode incluir atraso na fala, dificuldade em manter uma conversa ou dificuldade em expressar emoções e sentimentos.</li>
            <li><strong>Interesses intensos e específicos:</strong> A pessoa pode se aprofundar em um único tópico ou atividade de maneira extremamente detalhada.</li>
            <li><strong>Necessidade de rotinas rígidas:</strong> Mudanças na rotina diária podem gerar grande desconforto e estresse.</li>
            <li><strong>Hipersensibilidade ou hipossensibilidade sensorial:</strong> Reações exageradas a sons, luzes, texturas ou até a dor, ou então a falta de resposta a estímulos sensoriais.</li>
            <li><strong>Dificuldade na interação social:</strong> Pode haver dificuldades para entender as normas sociais, como manter contato visual ou interpretar expressões faciais.</li>
            <li><strong>Comportamentos repetitivos:</strong> Movimentos repetitivos, como balançar as mãos ou o corpo, ou ações como alinhar objetos de forma rígida.</li>
        </ul>
        <div class="text-center mt-3">
            <img src="pessoaautista2.jpeg" class="img-fluid rounded" alt="Imagem ilustrativa">
        </div>
    </div>

    <div class="content mt-4">
        <h2>Importância da Observação</h2>
        <p>Identificar os sinais do autismo de forma precoce é fundamental, pois permite que a pessoa autista tenha acesso a intervenções adequadas desde cedo, o que pode melhorar significativamente o desenvolvimento de habilidades de comunicação, sociais e adaptativas. A observação cuidadosa dos sinais, especialmente durante os primeiros anos de vida, pode ser a chave para um diagnóstico mais preciso e uma abordagem terapêutica eficaz.</p>
        
        <p>Em muitas situações, os sinais do autismo podem ser difíceis de perceber, especialmente quando a pessoa autista desenvolve estratégias para compensar suas dificuldades. Isso é particularmente comum em crianças com inteligência média ou acima da média, o que pode atrasar o diagnóstico. Além disso, a presença de características autísticas pode ser confundida com outras condições, como:</p>
        
        <ul>
            <li><strong>Transtornos de Ansiedade:</strong> Muitas pessoas autistas apresentam níveis elevados de ansiedade, o que pode levar à confusão, já que sintomas como evitação social ou dificuldade em lidar com mudanças podem ser vistos como manifestações típicas da ansiedade.</li>
            <li><strong>Transtornos de Déficit de Atenção e Hiperatividade (TDAH):</strong> A impulsividade, dificuldade de concentração e inquietação, comuns no TDAH, podem ser confundidas com dificuldades de autorregulação e comportamentos repetitivos de pessoas autistas.</li>
            <li><strong>Transtornos de Comunicação:</strong> A dificuldade em se comunicar e compreender as normas sociais pode ser interpretada como um atraso no desenvolvimento da fala ou um transtorno de linguagem, quando, na verdade, são características do autismo.</li>
            <li><strong>Transtornos de Personalidade:</strong> Em casos mais extremos, comportamentos como a dificuldade em estabelecer e manter relacionamentos ou a rigidez nas rotinas podem ser diagnosticados erroneamente como transtornos de personalidade, especialmente se a pessoa for diagnosticada tardiamente, na adolescência ou na idade adulta.</li>
        </ul>
        
        <p>Portanto, é fundamental que os profissionais de saúde e os pais observem cuidadosamente as manifestações comportamentais e busquem um diagnóstico adequado. Um diagnóstico precoce e preciso permite que a pessoa autista receba o suporte necessário para desenvolver suas habilidades e enfrentar os desafios de forma mais eficaz.</p>
    </div>

    <div class="content mt-4">
        <h2>Referências</h2>
        <ul>
            <li>Autistic Self Advocacy Network (ASAN) – <a href="https://autisticadvocacy.org/" target="_blank">https://autisticadvocacy.org/</a></li>
            <li>National Autistic Society – <a href="https://www.autism.org.uk/" target="_blank">https://www.autism.org.uk/</a></li>
            <li>Revista Autismo – <a href="https://www.revistaautismo.com.br/" target="_blank">https://www.revistaautismo.com.br/</a></li>
            <li>Instituto de Psiquiatria da USP – <a href="https://www.ipq.usp.br/" target="_blank">https://www.ipq.usp.br/</a></li>
        </ul>
    </div>
</div>

<?php include 'footer.php'; ?>
