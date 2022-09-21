@extends('base.index')

@section('container')

<h1>Urna Eletrônica</h1>

  <div class="urna-area">
    <div class="urna">
      <div class="tela">
        <div class="principal">
          <div class="esquerda">
            <div class="rotulo r1">
              <span>Seu voto para</span>
            </div>
            <div class="rotulo r2">
              <span>Cargo</span>
            </div>
            <div class="rotulo r3">
              <div class="numero pisca"></div>
              <div class="numero"></div>
            </div>
            <div class="rotulo r4">
              <div class="mensagem"></div>
              <p class="nome-candidato">Nome: <span>Fulano de Tal</span></p>
              <p class="partido-politico">Partido: <span>XXXX</span></p>
              <p class="nome-vice">Vice-Presidente: <span>Ciclano de Tal</span></p>
            </div>
          </div>
          <div class="direita">
            <div class="candidato">
              <div class="imagem">
                <img height="100" src="" alt="Candidato">
              </div>
              <div class="cargo">
                <p>Presidente</p>
              </div>
            </div>
            <div class="candidato menor">
              <div class="imagem">
                <img src="" alt="Vice">
              </div>
              <div class="cargo">
                <p>Vice</p>
              </div>
            </div>
          </div>
        </div>
        <div class="rodape">
          <p>
            Aperte a tecla<br>
            CONFIRMA para CONFIRMAR este voto<br>
            CORRIGE para REINICIAR este voto.
          </p>
        </div>
      </div>

      <div class="lateral">
        <div class="logoarea">
          <img src="img/brasao.png" alt="Brasão da República">
          <h2>Justiça Eleitoral</h2>
        </div>
        <div class="teclado">
          <div class="teclado--linha">
            <div class="teclado--botao">1</div>
            <div class="teclado--botao">2</div>
            <div class="teclado--botao">3</div>
          </div>
          <div class="teclado--linha">
            <div class="teclado--botao">4</div>
            <div class="teclado--botao">5</div>
            <div class="teclado--botao">6</div>
          </div>
          <div class="teclado--linha">
            <div class="teclado--botao">7</div>
            <div class="teclado--botao">8</div>
            <div class="teclado--botao">9</div>
          </div>
          <div class="teclado--linha">
            <div class="teclado--botao">0</div>
          </div>
          <div class="teclado--linha">
            <div class="teclado--botao especial branco">Branco</div>
            <div class="teclado--botao especial laranja">Corrige</div>
            <div class="teclado--botao especial verde">Confirma</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <form id="formvotos" method="post" action="/votos/store">
    <input type="hidden" name="listavotos" id="listavotos" value=""></input>
    <input type="hidden" name="tituloeleitor" id="tituloeleitor" value=""></input>
    <input type='hidden' name='_token' value='{{ csrf_token() }}' required/>
  </form>
  @endsection