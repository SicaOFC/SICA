<?php
class login
{

    private $rm;
    private $nome;
    private $classe;
    private $email;
    private $sexo;
    private $nascimento;
    private $senha;

    public function getRM()
    {
        return $this->rm;
    }
    public function setRM($rm)
    {
        $this->rm = $rm;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function getClasse()
    {
        return $this->classe;
    }
    public function setClasse($classe)
    {
        $this->classe = $classe;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setSexo($sexo)
    {
        $this->$sexo = $sexo;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function setNascimento($nascimento)
    {
        $this->$nascimento = $nascimento;
    }
    public function getNascimento()
    {
        return $this->nascimento;
    }
    public function setEmail($email)
    {
        $this->$email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function logar()
    {
        include_once "../conexao/conexao.php";

        try {
            $Comando = $conexao->prepare("SELECT * FROM alunos WHERE nome = ? AND senha = ?");
            $Comando->bindParam(1, $this->nome);
            $Comando->bindParam(2, $this->senha);
            $Comando->execute();
            $cliente = $Comando->fetch(PDO::FETCH_ASSOC);
            if ($cliente && password_verify($this->senha, $cliente['senha'])) {
                $_SESSION['nome'] = $this->nome;
                $_SESSION['id'] = $cliente['id'];
                setcookie('nome', $_SESSION['nome'], time() + 3600, '/');
                setcookie('id', $_SESSION['id'], time() + 3600, '/');
                return "Entrou";
            } else {
                return "nome ou senha errados";
            }


        } catch (PDOException $erro) {
            $Retorno = "Erro: " . $erro->getMessage();
            return $Retorno;
        }
    }

    public function cadastrar()
    {
        include_once "../conexao/conexao.php";

        try {
            $Comando = $conexao->prepare("SELECT * FROM alunos WHERE nome = ? OR senha = ?");
            $Comando->bindParam(1, $this->nome);
            $Comando->bindParam(2, $this->senha);
            $Comando->execute();

            if ($Comando->rowCount() == 0) {
                $senha = password_hash($this->senha, PASSWORD_ARGON2ID);
                $smt = $conexao->prepare("INSERT INTO alunos (rm, nome, classe, email, sexo, nascimento, senha) VALUES (?, ?, ?, ?, ? , ?, ?)");
                $smt->bindParam(1, $this->rm);
                $smt->bindParam(2, $this->nome);
                $smt->bindParam(3, $this->classe);
                $smt->bindParam(4, $this->email);
                $smt->bindParam(5, $this->sexo);
                $smt->bindParam(6, $this->nascimento);
                $smt->bindParam(7, $senha);
                $smt->execute();
            } else {
                return "ja existe esse cadastro";
            }
            if ($smt->rowCount() > 0) {
                $_SESSION['nome'] = $this->nome;
                $_SESSION['id'] = $conexao->lastInsertId();
                setcookie('nome', $_SESSION['nome'], time() + 3600, '/');
                setcookie('id', $_SESSION['id'], time() + 3600, '/');
                header("Location: perfil.php");
                exit();
            }
        } catch (PDOException $erro) {
            return "Erro ao cadastrar: " . $erro->getMessage();
        }
    }

    // public function verificar()
    // {
    //     include_once "../conexao/conexao.php";

    //     $Comando = $conexao->prepare("SELECT * FROM alunos WHERE nome = ? OR rm = ?");
    //     $Comando->bindParam(1, $this->nome);
    //     $Comando->bindParam(2, $this->rm);
    //     $Comando->execute();

    //     if ($Comando->rowCount() == 0) {

    //         $mensagem = mt_rand(100000, 999999);
    //         $para = $this->login;
    //         $assunto = 'Olá! Este é um e-mail de teste.';
    //         $headers = "From:lucas.batata2007@gmail.com";

    //         if (mail($para, $assunto, $mensagem, $headers)) {
    //             $_SESSION['email'] = $this->login;
    //             $_SESSION['senha'] = $this->senha;
    //             $_SESSION['nick'] = $this->nick;
    //             $_SESSION['number'] = $mensagem;
    //             header("Location: form_verificar.php");
    //             return 'E-mail enviado com sucesso para ' . $para;
    //         } else {
    //             return 'Erro ao enviar o e-mail.';
    //         }
    //     }
    //     return "email ou nickname ja registrados ";
    // }

    // public function mail_rec()
    // {
    //     include_once "../conexao/conexao.php";
    //     $Comando = $conexao->prepare("SELECT * FROM login WHERE Email = ? ");
    //     $Comando->bindParam(1, $this->login);
    //     $Comando->execute();
    //     if ($Comando->rowCount() == 1) {

    //         $mensagem = mt_rand(100000, 999999);
    //         $para = $this->login;
    //         $assunto = 'Olá! Este é um e-mail de teste.';
    //         $headers = "From:lucas.batata2007@gmail.com";

    //         if (mail($para, $assunto, $mensagem, $headers)) {
    //             $_SESSION['email'] = $this->login;
    //             $_SESSION['number'] = $mensagem;
    //             header("Location: form_verificar_rec.php");
    //             return 'E-mail enviado com sucesso para ' . $para;
    //         } else {
    //             return 'Erro ao enviar o e-mail.';
    //         }
    //     } else {
    //         echo "este email ainda n foi cadastrado";
    //     }


    // }

    public function alterar()
    {
        include_once "../conexao/conexao.php";
        $senha = password_hash($this->senha, PASSWORD_ARGON2ID);
        $Comando = $conexao->prepare("UPDATE alunos SET senha = ? WHERE nome = ?");
        $Comando->bindParam(1, $senha);
        $Comando->bindParam(2, $this->nome);
        $Comando->execute();
        return "alterado com sucesso";
    }

    public function log_out()
    {
        setcookie('id', null, -1, '/');
        setcookie('login', null, -1, '/');
        session_destroy();
        return "cookie excluido";
    }
}