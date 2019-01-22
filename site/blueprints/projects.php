<?php if(!defined('KIRBY')) exit ?>

title: Projects
pages:
  template:
    - project
    - project.video
files: true
deletable: false
options:
  url: false
fields:
  title:
    label: Title
    type:  text
  text:
    label: Text
    type:  textarea