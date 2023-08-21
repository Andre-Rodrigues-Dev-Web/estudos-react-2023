# Lógica de notificações atualizada 20/08/2023

## Primeira solução

Mover campos da tabela notificações para a tabela login, de forma que cada usuário receba sua notificação.

## Segunda solução

Criar um update onde o admin ao selecionar o usuário específico ele envia a notificação, e por padrão ele deverá enviar para todos os usuários cadastrados.

## Campos a serem mudados na login

titulo_notificacoes

data_notificacoes

texto_notificacoes

status_notificacoes: lido, nao_lido, removida
