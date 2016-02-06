# vc_extender
extender for visual composer wordpress plugin

how to setup:
- copy the files (directory vc_extender) and paste in your active theme directory;
- example: create new directory in theme directory (ex: inc) and place vc_extender directory in "inc" directory
- after that, add 2 lines of code in your functions.php of your theme, 

> require get_template_directory() . '/inc/vc_extender/df_vc_extender.php';
> new vc_extender();

version: 0
