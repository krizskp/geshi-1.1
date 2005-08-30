<?php
/**
 * GeSHi - Generic Syntax Highlighter
 * 
 * For information on how to use GeSHi, please consult the documentation
 * found in the docs/ directory, or online at http://geshi.org/docs/
 * 
 *  This file is part of GeSHi.
 *
 *  GeSHi is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  GeSHi is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with GeSHi; if not, write to the Free Software
 *  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * You can view a copy of the GNU GPL in the COPYING file that comes
 * with GeSHi, in the docs/ directory.
 *
 * @package   lang
 * @author    Nigel McNie <nigel@geshi.org>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL
 * @copyright (C) 2005 Nigel McNie
 * @version   $Id$
 * 
 */

$this->_contextDelimiters = array(
    0 => array(
        0 => array('asm'),
        1 => array('end'),
        2 => false
    )
);

$this->_childContexts = array(
    new GeSHiContext('delphi', $CONTEXT, 'preprocessor'),
    new GeSHiContext('delphi', $CONTEXT, 'common/single_comment')
);

$this->_styler->setStyle($CONTEXT, 'color:#22f;');
$this->_styler->setStartStyle($CONTEXT, 'color:#22f;font-weight:bold;');
$this->_styler->setEndStyle($CONTEXT, 'color:#22f;font-weight:bold;');

$this->_contextKeywords = array(
    0 => array(
        0 => array(
            'mov', 'cmp', 'ja', 'jb', 'xor', 'inc', 'jmp', 'test', 'jz', 'not', 'setnz',
            'call', 'push', 'cmovz', 'lea', 'db', 'sub', 'jnz', 'movzx', 'bt', 'setc'
        ),
        1 => $CONTEXT . '/keywords',
        2 => 'color:#880;font-weight:bold;',
        3 => false,
        4 => ''
    )
);

$this->_contextSymbols  = array(
    0 => array(
        0 => array(
            ',', ';', '[', ']', '@', '.'
            ),
        1 => $CONTEXT . '/sym',
        2 => 'color:#008000;'
        ),
    1 => array(
        0 => array(
            '/(\$[0-9a-fA-F_]+)/'
        ),
        1 => '$',
        2 => array(
            1 => array($CONTEXT . '/hex', 'color: #2bf;', false)
        )
    ),
    2 => geshi_use_integers($CONTEXT)
);

$this->_contextRegexps  = array(
    0 => array(
        0 => array('#([a-zA-Z]+:)#'),
        1 => ':',
        2 => array(
            1 => array($CONTEXT . '/label', 'color:#933;', false)
        )
    )
);

$this->_objectSplitters = array(
    0 => array(
        0 => array('.'),
        1 => $CONTEXT . '/oodynamic',
        2 => 'color:#559;',
        3 => false // If true, check that matched method isn't a keyword first
    )
);

?>