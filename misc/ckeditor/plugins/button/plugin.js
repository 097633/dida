﻿/*
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.add('button',{beforeInit:function(a) {a.ui.addHandler(CKEDITOR.UI_BUTTON,CKEDITOR.ui.button.handler);}});CKEDITOR.UI_BUTTON=1;CKEDITOR.ui.button=function(a) {CKEDITOR.tools.extend(this,a,{title:a.label,className:a.className||a.command&&'cke_button_'+a.command||'',click:a.click||(function(b) {b.execCommand(a.command);})});this._={};};CKEDITOR.ui.button.handler={create:function(a) {return new CKEDITOR.ui.button(a);}};CKEDITOR.ui.button.prototype={canGroup:true,render:function(a,b) {var c=CKEDITOR.env,d=this._.id='cke_'+CKEDITOR.tools.getNextNumber();this._.editor=a;var e={id:d,button:this,editor:a,focus:function() {var k=CKEDITOR.document.getById(d);k.focus();},execute:function() {this.button.click(a);}},f=CKEDITOR.tools.addFunction(e.execute,e),g=CKEDITOR.ui.button._.instances.push(e)-1,h='',i=this.command;if (this.modes)a.on('mode',function() {this.setState(this.modes[a.mode]?CKEDITOR.TRISTATE_OFF:CKEDITOR.TRISTATE_DISABLED);},this);else if (i) {i=a.getCommand(i);if (i) {i.on('state',function() {this.setState(i.state);},this);h+='cke_'+(i.state==CKEDITOR.TRISTATE_ON?'on':i.state==CKEDITOR.TRISTATE_DISABLED?'disabled':'off');}}if (!i)h+='cke_off';if (this.className)h+=' '+this.className;b.push('<span class="cke_button">','<a id="',d,'" class="',h,'" href="javascript:void(\'',(this.title||'').replace("'",''),'\')" title="',this.title,'" tabindex="-1" hidefocus="true"');if (c.opera||c.gecko&&c.mac)b.push(' onkeypress="return false;"');if (c.gecko)b.push(' onblur="this.style.cssText = this.style.cssText;"');b.push(' onkeydown="return CKEDITOR.ui.button._.keydown(',g,', event);" onfocus="return CKEDITOR.ui.button._.focus(',g,', event);" onclick="CKEDITOR.tools.callFunction(',f,', this); return false;"><span class="cke_icon"');if (this.icon) {var j=(this.iconOffset||0)*(-16);b.push(' style="background-image:url(',CKEDITOR.getUrl(this.icon),');background-position:0 '+j+'px;"');}b.push('></span><span class="cke_label">',this.label,'</span>');if (this.hasArrow)b.push('<span class="cke_buttonarrow"></span>');b.push('</a>','</span>');if (this.onRender)this.onRender();return e;},setState:function(a) {var f=this;if (f._.state==a)return;var b=CKEDITOR.document.getById(f._.id);if (b) {b.setState(a);var c=f.title,d=f._.editor.lang.common.unavailable,e=b.getChild(1);if (a==CKEDITOR.TRISTATE_DISABLED)c=d.replace('%1',f.title);e.setHtml(c);}f._.state=a;}};CKEDITOR.ui.button._={instances:[],keydown:function(a,b) {var c=CKEDITOR.ui.button._.instances[a];if (c.onkey) {b=new CKEDITOR.dom.event(b);
return c.onkey(c,b.getKeystroke())!==false;}},focus:function(a,b) {var c=CKEDITOR.ui.button._.instances[a],d;if (c.onfocus)d=c.onfocus(c,new CKEDITOR.dom.event(b))!==false;if (CKEDITOR.env.gecko&&CKEDITOR.env.version<10900)b.preventBubble();return d;}};CKEDITOR.ui.prototype.addButton=function(a,b) {this.add(a,CKEDITOR.UI_BUTTON,b);};
