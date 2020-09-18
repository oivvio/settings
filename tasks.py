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
    """Build css and js """
    preflight_checklist()

    cmd = f"{NVM_USE}; npm run css; npm run js"
    ctx.run(cmd, pty=True)


@task
def build_css(ctx, watch=True):
    """Build css only """
    preflight_checklist()

    if watch:
        watch_prefix = f"find ./|grep 'css$'|grep -v node_modules|entr "
    else:
        watch_prefix = " "
    cmd = f"{NVM_USE}; {watch_prefix} npm run css"
    ctx.run(cmd, pty=True)


@task
def build_mam_css(ctx, watch=True):
    """Build mam css only """
    preflight_checklist()

    if watch:
        watch_prefix = f"find ./src/styles/mam/|grep 'scss$'|grep -v '#'| entr "
    else:
        watch_prefix = " "
    cmd = f"{NVM_USE}; {watch_prefix} sassc ./src/styles/mam/mam.scss ./src/styles/mam.css"
    ctx.run(cmd, pty=True)


@task
def push(ctx):
    """Push everything to live site """
    preflight_checklist()

    lftp_connect = "lftp -p 22 --env-password sftp://settings.se@ssh.settings.se "
    exclude = "  --exclude node_modules/ --exclude Pipfile.* --exclude .git/ "
    src = "."
    dst = "wp-content/themes/settings"
    lftp_command = f"mirror {exclude}  -R --parallel=20 {src} {dst}; quit"
    cmd = f"{lftp_connect} -e '{lftp_command}'"

    ctx.run(cmd, pty=True)


@task
def mirror_live_site_to_local(ctx):
    """Mirror live site to local """
    preflight_checklist()

    lftp_connect = "lftp -p 22 --env-password sftp://settings.se@ssh.settings.se "
    exclude = " --exclude wp-content/themes/settings "
    src = "."
    dst = "~/opc/wp-settings"
    lftp_command = f"mkdir -p {dst}; mirror {exclude}  --parallel=20 {src} {dst}; quit"
    cmd = f"{lftp_connect} -e '{lftp_command}'"

    ctx.run(cmd, pty=True)
