import React from 'react'
import { Link } from 'react-router-dom'
import { MenuList, MenuItem, AppBar, Toolbar, IconButton, Typography, Drawer, List, ListItem, ListItemText, ListItemIcon, Divider, Collapse} from '@mui/material'
import { FaGraduationCap, FaCoins, FaSignOutAlt, FaAngleUp, FaAngleDown } from "react-icons/fa";
import {MdMenu} from 'react-icons/md'
import { ThemeProvider, createTheme } from "@mui/material/styles";

export default function Header(props) {
    const [state, setState] = React.useState({
        open: false
    })

    const [collapse, setCollapse] = React.useState({
        site:false
    })

    const cloudTheme = createTheme({
        palette: {
            primary: {
                main: "#15034c",
            },
        },
    });


  return (
      <>
          {window.innerWidth < 577 ? (
              <ThemeProvider theme={cloudTheme}>
                  <AppBar position="fixed">
                      <Toolbar>
                          <IconButton
                              size="large"
                              edge="start"
                              color="inherit"
                              aria-label="menu"
                              onClick={() => setState({ open: true })}
                              sx={{ mr: 2 }}
                          >
                              <MdMenu />
                          </IconButton>
                          <Typography
                              variant="h6"
                              component="div"
                              sx={{ flexGrow: 1 }}
                          >
                              {props.title}
                          </Typography>
                      </Toolbar>
                  </AppBar>
              </ThemeProvider>
          ) : (
              <nav class="header navbar navbar-expand-lg navbar-light bg-wiite p-0">
                  <div className="container">
                      <Link className="navbar-brand" to="/">
                          <img
                              src="/logo150.png"
                              alt="Bravi"
                              height="50"
                              className="rounded"
                          />
                      </Link>

                      <ul className="navbar-nav ">
                          <li className="nav-item">
                              
                          </li>

                          <li className="nav-item dropdown">
                              
                              
                          </li>

                          <li className="nav-item">
                              <Link className="nav-link" to="#">
                                  <FaSignOutAlt className="icon-md mr-2" /> Sair
                              </Link>
                          </li>
                      </ul>
                  </div>
              </nav>
          )}

          <Drawer
              anchor="left"
              open={state.open}
              onClose={() => setState({ open: false })}
          >
              <div style={{ width: 320, maxWidth: window.innerWidth - 70 }}>
                  <List component="nav" className="menu-mobile">
                      <ListItem>
                          <img
                              className="img-fluid rounded logo-mobile"
                              src="/logo150.png"
                              alt="Cloudfox"
                              height="40"
                          />
                      </ListItem>

                      <ListItem>thanos@gmail.com</ListItem>

                      <Divider className="mt-2 mb-3" />

                      <ListItem>
                          <ListItemIcon>
                              <FaGraduationCap className="icon-lg" />
                          </ListItemIcon>
                          <ListItemText primary="Cursos" />
                      </ListItem>

                      <ListItem
                          button
                          onClick={() =>
                              setCollapse({
                                  site: collapse.site ? false : true,
                              })
                          }
                      >
                          <ListItemIcon>
                              <FaCoins className="icon-lg mr-2" />
                          </ListItemIcon>
                          <ListItemText primary="Financeiro" />
                          {collapse.site ? <FaAngleUp /> : <FaAngleDown />}
                      </ListItem>

                      <Collapse in={collapse.site} timeout="auto" unmountOnExit>
                          <List component="div">
                              <ListItem
                                  component={Link}
                                  to="/pay"
                                  onClick={() => setState({ open: false })}
                              >
                                  <ListItemText
                                      className="pl-5"
                                      primary="Pay"
                                  />
                              </ListItem>
                          </List>
                      </Collapse>

                      <Divider className="mt-2 mb-2" />

                      <ListItem>
                          <ListItemIcon>
                              <FaSignOutAlt className="icon-md" />
                          </ListItemIcon>
                          <ListItemText primary="Sair" />
                      </ListItem>
                  </List>
              </div>
          </Drawer>
      </>
  );
}
