#!/usr/bin/python3
from invoke import task
from pathlib import Path

NVM_USE = "source ~/.nvm/nvm.sh; nvm use"


def preflight_checklist():

    # Check that we are in the project root folder
    if not Path("tasks.py").exists():
        print("Please run tasks from the root project folder")
        exit()


@task
def build(ctx):
    preflight_checklist()

    cmd = f"{NVM_USE}; npm run css; npm run js"
    ctx.run(cmd, pty=True)


@task
def push(ctx):
    preflight_checklist()

    lftp_connect = "lftp -p 22 --env-password sftp://settings.se@ssh.settings.se "
    exclude = "  --exclude node_modules/ --exclude Pipfile.* --exclude .git/ "
    src = "."
    dst = "wp-content/themes/settings"
    lftp_command = f"mirror {exclude}  -R --parallel=20 {src} {dst}; quit"
    cmd = f"{lftp_connect} -e '{lftp_command}'"
    print(cmd)
    ctx.run(cmd, pty=True)
