# JCE Media Converter for Joomla 6

[![Joomla! 6.0](https://img.shields.io/badge/Joomla%20%21-6.0-blue.svg?style=flat-square)](https://joomla.org)
[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-green.svg?style=flat-square)](https://www.gnu.org/licenses/gpl-2.0.html)

A lightweight, robust, and **100% upgrade-safe** system plugin for Joomla 6 that automatically and transparently converts all standard core and third-party `"media"` fields into JCE `"mediajce"` fields at runtime.

This brings the premium **JCE File Browser** modal integration globally across your entire website without altering a single line of code or XML configuration in any other extension.

---

## 💡 The Problem (Why this plugin is needed)

By default, Joomla 6 uses the core Media Manager for its standard media fields (`type="media"`). However, many websites rely on the premium **JCE File Browser** (`type="mediajce"`) for its advanced file management features, structured folder permissions, image resizing options, and robust backend browser interface.

To use the JCE File Browser across your components and modules, you would normally have to:
1. Manually edit every form's XML file to change `type="media"` to `type="mediajce"`.
2. Risk losing these changes whenever Joomla or third-party extensions are updated.

---

## 🛠️ The Solution

This system plugin resolves this challenge by intercepting all backend forms in real-time before they are rendered:

1. **Automatic XML Scanning**: Hooks directly into Joomla's native `onContentPrepareForm` event.
2. **Dynamic Rewrite**: Uses XPath to locate all fields of type `"media"` and rewrites their type to `"mediajce"` in memory.
3. **DI Class Resolution**: Automatically registers JCE's field resolution directories so Joomla's modern form container can load the premium `mediajce` element class flawlessly.
4. **Zero Configuration**: Simply install and enable the plugin. Your modules, custom fields, and components instantly gain premium JCE File Browser popups for all image and file selections!

---

## 🚀 Installation & Setup

1. **Download the Repository**:
   Clone or download this repository.
2. **Package as Zip**:
   Compress the contents into a standard `.zip` file (containing `jcemediaconverter.php`, `jcemediaconverter.xml`, `services/`, `src/`, `language/`, etc.).
3. **Install in Joomla 6**:
   Go to your Joomla Backend → **System** → **Install** → **Extensions**, and upload the zip file.
4. **Enable the Plugin**:
   Go to **System** → **Manage** → **Plugins**, search for **System - JCE Media Converter** (`jcemediaconverter`), and enable it.

---

## 🌍 Languages Supported

- 🇺🇸 **English (`en-GB`)**
- 🇧🇷 **Portuguese (`pt-BR`)**

---

## 📄 License

This project is licensed under the GNU General Public License v2 or later. See the `LICENSE.txt` file for details.
